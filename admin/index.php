<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/auth.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    $email = trim((string)($_POST['email'] ?? ''));
    $pass  = (string)($_POST['password'] ?? '');
    if (!rate_limit('admin_login', 5, 900)) {
        $error = 'Too many attempts. Try again later.';
    } else {
        $stmt = db()->prepare('SELECT * FROM admins WHERE email=? AND is_active=1');
        $stmt->execute([$email]);
        $u = $stmt->fetch();
        if ($u && password_verify($pass, $u['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['admin'] = ['id' => $u['id'], 'name' => $u['name'], 'role' => $u['role']];
            $_SESSION['admin_last'] = time();
            db()->prepare('UPDATE admins SET last_login=NOW() WHERE id=?')->execute([$u['id']]);
            audit('login', ['email' => $email]);
            header('Location: /admin/dashboard.php'); exit;
        }
        $error = 'Invalid credentials.';
        audit('login_failed', ['email' => $email]);
    }
}
?>
<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>Admin Login</title><link rel="stylesheet" href="/assets/css/style.css"></head>
<body class="admin-body"><div class="login-wrap">
<form class="login-card appt-form" method="post">
  <div class="brand" style="margin-bottom:1rem"><span class="brand-mark"><span></span></span>
  <span class="brand-text"><strong>Admin Panel</strong><small>lasiksurgeryindelhi.com</small></span></div>
  <?php if (isset($_GET['timeout'])): ?><div class="form-error">Session expired. Please sign in again.</div><?php endif; ?>
  <?php if ($error): ?><div class="form-error"><?= e($error) ?></div><?php endif; ?>
  <?= csrf_field() ?>
  <label>Email<input type="email" name="email" required autocomplete="username"></label>
  <label>Password<input type="password" name="password" required autocomplete="current-password"></label>
  <button class="btn btn-primary btn-block" type="submit">Sign in</button>
  <p class="form-note">Protected area. All activity is logged.</p>
</form></div></body></html>
