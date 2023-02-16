<?php
$method = $_SERVER['REQUEST_METHOD'];

$formData = getFormData($method);

function getFormData($method) {

    if ($method === 'GET') return $_GET;

    $data = json_decode( file_get_contents('php://input') );

    $path = $_SERVER['REQUEST_URI'];

    return ['data' => $data, 'path' => $path];
}

$routes = [
    'methods' => [
        'POST' => [
            '/login' => 'login.php'
        ]
    ]
];

if(isset($routes['methods'][$method][$formData['path']])) {
    require_once ('routes/'.$routes['methods'][$method][$formData['path']]);
}