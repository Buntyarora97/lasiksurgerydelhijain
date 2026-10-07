<?php
/**
 * Central configuration — lasiksurgeryindelhi.com
 * SHARED HOSTING: edit ONLY this file (or use environment variables below).
 * NEVER commit real passwords. All secrets live here / outside web root ideally.
 */
declare(strict_types=1);

define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'u123456789_lasik');
define('DB_USER', getenv('DB_USER') ?: 'u123456789_lasik');
define('DB_PASS', getenv('DB_PASS') ?: 'CHANGE_ME');

define('SITE_NAME', 'LASIK Surgery in Delhi');
define('SITE_URL',  'https://lasiksurgeryindelhi.com'); // no trailing slash
define('SITE_ENV',  getenv('SITE_ENV') ?: 'staging');   // staging = noindex. Change to 'production' ONLY after verification gate.

/* ---- Provider (subject to client verification) ---- */
define('HOSPITAL_NAME', 'Jain Eye Hospital & Laser Centre');
define('HOSPITAL_TAG',  'Advanced Super-Speciality Eye Care');
define('DOCTOR_NAME',   'Dr. Rajat Jain');
define('DOCTOR_ROLE',   'Medical Director & Consultant — Cornea & Anterior Segment, Cataract, LASIK & Refractive Surgery');
define('HOSPITAL_URL',  'https://jaineyehospitalasercentre.com/');
define('DOCTOR_URL',    'https://drrajatjain.com/');
define('ASSOCIATION_LINE', 'A focused patient-education and consultation platform associated with Jain Eye Hospital & Laser Centre.');

/* [VERIFY COUNTRY CODE AND DIGITS BEFORE GO-LIVE] — supplied format is unusual for Delhi */
define('PHONE_DISPLAY', '+0412 500 063');
define('PHONE_LINK',    'tel:+0412500063');
define('EMAIL_MAIN',    'info@jaineyehospitals.com');
/* [VERIFY WHATSAPP NUMBER IN E.164 FORMAT] — keep hidden until confirmed */
define('WHATSAPP_NUMBER', ''); // e.g. '919876543210' — empty = button hidden
define('WHATSAPP_MSG', 'Hello, I would like information about booking a refractive-surgery evaluation.');

define('ADDRESS_LINE', 'AG 152, Shalimar Bagh, Delhi 110088');
define('MAPS_QUERY',   'Jain Eye Hospital & Laser Centre, AG 152, Shalimar Bagh, Delhi 110088');

date_default_timezone_set('Asia/Kolkata');
session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax', 'secure' => !empty($_SERVER['HTTPS'])]);
if (session_status() === PHP_SESSION_NONE) { session_start(); }
