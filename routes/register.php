<?php
require_once 'classes/Database.php';
require_once 'classes/Users.php';

$db = new Database();
$conn = $db->getConnection();

$user = new Users($conn);

$result = $user->register($formData['data']);

if($result['message'] === 'Success login') {
    http_response_code(200);
    echo json_encode($result);
} else {
    http_response_code(401);
    echo json_encode($result);

}


