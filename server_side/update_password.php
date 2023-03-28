<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

require_once("classes/database_class.php");
require_once("classes/email_class.php");

function checkPasswordStrength($password) {
    if (preg_match('/^[a-zA-Z]+$/', $password)) {
        return 'weak';
    } elseif (preg_match('/^[a-zA-Z0-9]+$/', $password)) {
        return 'medium';
    } elseif (preg_match('/^[a-zA-Z0-9!@#$%^&*()_\-+=\[\]\{\}\|\:;"\'<>,.?\/`~]+$/', $password)) {
        return 'strong';
    } else {
        return 'invalid';
    }
}

// // Get the password from JavaScript
 $password_data = json_decode(file_get_contents('php://input'), true);
 $password = $password_data["password"];


// $data = array(
//     'message' => 'Hello, world!',
//     'status' => 'success'
//   );
  
//   header('Content-Type: application/json');
//   if (checkPasswordStrength($password) == 'weak')
//     echo json_encode(["status" => "password is weak"]);
//   else
//     echo json_encode(["status" => "password is okay"]);

    $sessionJson = json_encode($_SESSION);
    echo $sessionJson;