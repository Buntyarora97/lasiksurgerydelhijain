<?php
require_once __DIR__ . '/includes/auth.php';
audit('logout');
session_destroy();
header('Location: /admin/');
