<?php
// Load composer
require __DIR__ . '/../vendor/autoload.php';

// Prevent access to .env
if (file_exists(__DIR__ . '/../.env')) {
    exit('Access denied.');
}

$app = require __DIR__ . '/../bootstrap/app.php';

// Configure storage path
$app->useStoragePath('/tmp');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
