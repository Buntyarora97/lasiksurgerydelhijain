<?php
/**
 * Development router for the PHP built-in server.
 * Apache uses .htaccess in shared hosting; this keeps Replit preview clean URLs equivalent.
 */
declare(strict_types=1);

$uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = rawurldecode($uriPath);
$root = __DIR__;

if ($path !== '/' && is_file($root . $path)) {
    return false;
}

$route = trim($path, '/');
if (preg_match('#^guides/([a-z0-9-]+)/?$#i', $route, $guideMatch)) {
    $_GET['slug'] = strtolower($guideMatch[1]);
    require $root . '/guides.php';
    return true;
}
$target = $route === '' ? 'index.php' : $route . '.php';

if (is_file($root . '/' . $target)) {
    require $root . '/' . $target;
    return true;
}

http_response_code(404);
require $root . '/404.php';
return true;