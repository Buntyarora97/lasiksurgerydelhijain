<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/auth.php';
require_admin();

$pdo = db();
$stats = [
  'new' => (int)$pdo->query("SELECT COUNT(*) c FROM appointments WHERE status='new'")->fetch()['c'],
  'total' => (int)$pdo->query("SELECT COUNT(*) c FROM appointments")->fetch()['c'],
  'published_procs' => (int)$pdo->query("SELECT COUNT(*) c FROM procedures WHERE status='verified_offered'")->fetch()['c'],
  'reviews_due' => (int)$pdo->query("SELECT COUNT(*) c FROM medical_reviews WHERE next_review_date < CURDATE()")->fetch()['c'],
];
$recent = $pdo->query("SELECT * FROM appointments ORDER BY created_at DESC LIMIT 8")->fetchAll();
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow"><title>Dashboard — Admin</title><link rel="stylesheet" href="/assets/css/style.css"></head>
<body class="admin-body"><div class="admin-shell">
<aside class="admin-side">
  <div class="brand"><span class="brand-mark"><span></span></span>
    <span class="brand-text"><strong>LASIK Delhi</strong><small>Admin</small></span></div>
  <a href="/admin/dashboard.php" class="active">Dashboard</a>
  <a href="/admin/appointments.php">Appointments</a>
  <div class="side-sep"></div>
  <a href="/" target="_blank">View site ↗</a>
  <a href="/admin/logout.php">Sign out</a>
</aside>
<main class="admin-main">
  <div class="admin-top">
    <div><h2 style="margin:0">Dashboard</h2><p class="muted-sm">Signed in as <?= e(admin_user()['name']) ?> (<?= e(admin_user()['role']) ?>)</p></div>
  </div>
  <div class="admin-cards">
    <div class="stat-card"><b><?= $stats['new'] ?></b><span>New enquiries</span></div>
    <div class="stat-card"><b><?= $stats['total'] ?></b><span>Total enquiries</span></div>
    <div class="stat-card"><b><?= $stats['published_procs'] ?></b><span>Verified procedures</span></div>
    <div class="stat-card"><b><?= $stats['reviews_due'] ?></b><span>Medical reviews due</span></div>
  </div>
  <h3>Recent enquiries</h3>
  <div class="table-wrap"><table class="admin-table">
    <thead><tr><th>Ref</th><th>Name</th><th>Phone</th><th>Status</th><th>Received</th></tr></thead>
    <tbody>
    <?php foreach ($recent as $r): ?>
      <tr><td><?= e($r['ref_code']) ?></td><td><?= e($r['name']) ?></td><td><?= e($r['phone']) ?></td>
      <td><span class="badge badge-<?= e($r['status']) ?>"><?= e($r['status']) ?></span></td>
      <td><?= e($r['created_at']) ?></td></tr>
    <?php endforeach; if (!$recent): ?><tr><td colspan="5" class="muted">No enquiries yet.</td></tr><?php endif; ?>
    </tbody></table></div>
</main></div></body></html>
