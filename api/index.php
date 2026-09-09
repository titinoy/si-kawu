<?php

// Fix paths for Vercel serverless environment
$_SERVER['DOCUMENT_ROOT']   = __DIR__ . '/../public';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';
$_SERVER['PHP_SELF']        = '/index.php';

// Serve actual static files if they exist
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$filePath = __DIR__ . '/../public' . $uri;

if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false; // Let Vercel serve the static file
}

// Bootstrap Laravel
require __DIR__ . '/../public/index.php';
