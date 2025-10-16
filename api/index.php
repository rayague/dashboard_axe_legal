<?php

// For debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if running on Vercel
if (getenv('VERCEL')) {
    // Set default timezone
    date_default_timezone_set('UTC');
}

// Load composer
require __DIR__ . '/../vendor/autoload.php';

// Prevent access to .env in production
if (file_exists(__DIR__ . '/../.env') && getenv('APP_ENV') === 'production') {
    exit('Access denied.');
}

$app = require __DIR__ . '/../bootstrap/app.php';

// Configure storage path for Vercel
$app->useStoragePath(getenv('VERCEL') ? '/tmp' : storage_path());

// Handle trusted proxies
// Trust all proxies in Vercel environment
if (getenv('VERCEL')) {
    $app->make(\Illuminate\Http\Request::class)->setTrustedProxies(
        ['REMOTE_ADDR'],
        \Illuminate\Http\Request::HEADER_X_FORWARDED_FOR
    );
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
