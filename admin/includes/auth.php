<?php
declare(strict_types=1);
require_once dirname(__DIR__, 2) . '/includes/config.php';
require_once dirname(__DIR__, 2) . '/includes/functions.php';

function admin_user(): ?array { return $_SESSION['admin'] ?? null; }
function require_admin(): void {
    if (!admin_user()) { header('Location: /admin/'); exit; }
    // Inactivity timeout: 30 min
    if (isset($_SESSION['admin_last']) && (time() - $_SESSION['admin_last']) > 1800) {
        session_destroy(); header('Location: /admin/?timeout=1'); exit;
    }
    $_SESSION['admin_last'] = time();
}
function audit(string $action, array $meta = []): void {
    try {
        db()->prepare('INSERT INTO audit_logs (admin_id, action, meta) VALUES (?,?,?)')
            ->execute([admin_user()['id'] ?? null, $action, json_encode($meta)]);
    } catch (Throwable $e) { /* non-fatal */ }
}
