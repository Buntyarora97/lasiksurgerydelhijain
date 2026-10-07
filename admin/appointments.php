<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/auth.php';
require_admin();
if (!in_array(admin_user()['role'], ['super_admin','enquiry_manager'], true)) {
    http_response_code(403); exit('Forbidden');
}
$pdo = db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    $id = (int)$_POST['id'];
    $status = $_POST['status'];
    if (in_array($status, ['new','contacted','scheduled','completed','cancelled','spam'], true)) {
        $pdo->prepare('UPDATE appointments SET status=? WHERE id=?')->execute([$status, $id]);
        audit('appointment_status', ['id' => $id, 'status' => $status]);
    }
    header('Location: /admin/appointments.php'); exit;
}

$filter = $_GET['status'] ?? '';
$sql = "SELECT * FROM appointments" . (in_array($filter, ['new','contacted','scheduled','completed','cancelled','spam'], true) ? " WHERE status=?" : "") . " ORDER BY created_at DESC LIMIT 200";
$stmt = $pdo->prepare($sql);
$stmt->execute($filter ? [$filter] : []);
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow"><title>Appointments — Admin</title><link rel="stylesheet" href="/assets/css/style.css"></head>
<body class="admin-body"><div class="admin-shell">
<aside class="admin-side">
  <div class="brand"><span class="brand-mark"><span></span></span>
    <span class="brand-text"><strong>LASIK Delhi</strong><small>Admin</small></span></div>
  <a href="/admin/dashboard.php">Dashboard</a>
  <a href="/admin/appointments.php" class="active">Appointments</a>
  <div class="side-sep"></div>
  <a href="/" target="_blank">View site ↗</a>
  <a href="/admin/logout.php">Sign out</a>
</aside>
<main class="admin-main">
  <div class="admin-top"><h2 style="margin:0">Appointments / Enquiries</h2>
    <form method="get" style="display:flex;gap:.5rem">
      <select name="status"><option value="">All statuses</option>
        <?php foreach (['new','contacted','scheduled','completed','cancelled','spam'] as $s): ?>
        <option <?= $filter===$s?'selected':'' ?>><?= $s ?></option><?php endforeach; ?>
      </select><button class="btn btn-sm btn-primary">Filter</button></form>
  </div>
  <div class="table-wrap"><table class="admin-table">
    <thead><tr><th>Ref</th><th>Name</th><th>Phone</th><th>Preferred</th><th>Status</th><th>Received</th><th></th></tr></thead>
    <tbody><?php foreach ($rows as $r): ?>
      <tr><td><?= e($r['ref_code']) ?></td><td><?= e($r['name']) ?><br><span class="muted-sm"><?= e($r['age_range']) ?> · <?= e($r['city']) ?></span></td>
      <td><?= e($r['phone']) ?></td><td><?= e($r['preferred_contact']) ?><br><span class="muted-sm"><?= e($r['preferred_slot']) ?></span></td>
      <td><span class="badge badge-<?= e($r['status']) ?>"><?= e($r['status']) ?></span></td>
      <td><?= e($r['created_at']) ?></td>
      <td><form method="post" style="display:flex;gap:.4rem"><?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
        <select name="status"><?php foreach (['new','contacted','scheduled','completed','cancelled','spam'] as $s): ?>
          <option <?= $r['status']===$s?'selected':'' ?>><?= $s ?></option><?php endforeach; ?></select>
        <button class="btn btn-sm btn-ghost">Save</button></form></td></tr>
    <?php endforeach; if (!$rows): ?><tr><td colspan="7" class="muted">No records.</td></tr><?php endif; ?>
    </tbody></table></div>
</main></div></body></html>
