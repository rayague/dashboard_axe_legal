<?php
// Configuration de base pour le debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Réponse simple pour tester
echo json_encode([
    'status' => 'ok',
    'message' => 'Le point d\'entrée principal fonctionne',
    'version' => PHP_VERSION,
    'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'
]);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
