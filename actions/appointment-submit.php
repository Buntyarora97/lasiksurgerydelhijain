<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: /appointment'); exit; }
csrf_verify();

// Honeypot — bots fill the hidden "website" field
if (!empty($_POST['website'])) { http_response_code(400); exit('Invalid submission.'); }
// Timestamp trap — reject in under 2 seconds (likely a bot)
$ts = (int)($_POST['ts'] ?? 0);
if ($ts && (time() - $ts) < 2) { http_response_code(429); exit('Please try again.'); }
// Rate limit: 5 per hour per IP
if (!rate_limit('appointment', 5, 3600)) { http_response_code(429); exit('Too many requests. Please call us instead.'); }

// ---- Validation ----
$name     = trim((string)($_POST['name'] ?? ''));
$ageRange = trim((string)($_POST['age_range'] ?? ''));
$phone    = trim((string)($_POST['phone'] ?? ''));
$email    = trim((string)($_POST['email'] ?? ''));
$city     = trim((string)($_POST['city'] ?? ''));
$vc       = trim((string)($_POST['vision_correction'] ?? ''));
$slot     = trim((string)($_POST['preferred_slot'] ?? ''));
$contact  = trim((string)($_POST['preferred_contact'] ?? ''));
$message  = trim((string)($_POST['message'] ?? ''));
$srcUrl   = substr((string)($_POST['source_url'] ?? ''), 0, 255);

$errors = [];
if ($name === '' || mb_strlen($name) < 2 || mb_strlen($name) > 120) $errors[] = 'Please enter your full name.';
if (!in_array($ageRange, ['18–24','25–34','35–44','45–54','55+'], true)) $errors[] = 'Please select your age range.';
if (!preg_match('/^[0-9+\-\s]{8,16}$/', $phone)) $errors[] = 'Please enter a valid phone number.';
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email looks invalid.';
if (!in_array($vc, ['Spectacles','Contact lenses','Both','Neither'], true)) $errors[] = 'Please select what you currently use.';
if (!in_array($contact, ['Phone call','WhatsApp','Email'], true)) $errors[] = 'Please choose a preferred contact method.';
$privacy = !empty($_POST['consent_privacy']);
$nonEmergency = !empty($_POST['consent_non_emergency']);
if (!$privacy || !$nonEmergency) $errors[] = 'Both consent checkboxes are required.';

if ($errors) {
    flash('form_error', implode(' ', $errors));
    header('Location: ' . ($srcUrl ?: '/appointment')); exit;
}

// ---- Save ----
$ref = 'LS' . date('ymd') . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
try {
    $pdo = db();
    $pdo->prepare('INSERT INTO appointments
        (ref_code,name,age_range,phone,email,city,vision_correction,power_range,preferred_contact,preferred_slot,message,consent_privacy,consent_non_emergency,consent_version,source_url)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)')
        ->execute([$ref,$name,$ageRange,$phone,$email ?: null,$city ?: null,$vc,null,$contact,$slot ?: null,
                   $message ?: null,$privacy?1:0,$nonEmergency?1:0,'v1.0',$srcUrl]);
} catch (Throwable $e) {
    error_log('Appointment insert failed: ' . $e->getMessage());
    flash('form_error', 'Something went wrong on our side. Please call us directly.');
    header('Location: /appointment'); exit;
}

// ---- Emails (swap to PHPMailer+SMTP in production; mail() shown as fallback) ----
$adminTo = EMAIL_MAIN;
$adminSubject = 'New LASIK evaluation enquiry ' . $ref; // no patient details in subject
$adminBody = "New enquiry {$ref}\n\nName: {$name}\nAge: {$ageRange}\nPhone: {$phone}\nEmail: {$email}\nCity: {$city}\nUses: {$vc}\nPreferred: {$contact}\nSlot: {$slot}\nSource: {$srcUrl}\n\nMessage:\n{$message}\n";
$headers = "From: no-reply@lasiksurgeryindelhi.com\r\nReply-To: " . ($email ?: EMAIL_MAIN) . "\r\nContent-Type: text/plain; charset=utf-8";
@mail($adminTo, $adminSubject, $adminBody, $headers);

if ($email) {
    $patientSubject = 'We received your evaluation request';
    $patientBody = "Dear {$name},\n\nThank you for requesting a refractive-surgery evaluation. Your reference is {$ref}.\n\nThis is NOT a confirmation. Our team will contact you on {$phone} to agree a suitable time.\n\n" . HOSPITAL_NAME . "\n" . ADDRESS_LINE;
    @mail($email, $patientSubject, $patientBody, "From: no-reply@lasiksurgeryindelhi.com\r\nContent-Type: text/plain; charset=utf-8");
}

$_SESSION['appt_ref'] = $ref;
header('Location: /appointment?ref=' . urlencode($ref) . '&sent=1');
exit;
