<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

require_once("classes/database_class.php");
require_once("classes/email_class.php");

function checkPasswordStrength($password)
{
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
$password = md5($password_data["password"]);
$email = $_SESSION["email"];


if (checkPasswordStrength($password) == 'weak')
  $status_passStrengh = false;
else
  $status_passStrengh = true;

//  find a user with a specific email address and update their password in the users table
$connection = new Database();

$stmt = $connection->creat_PDO()->prepare('UPDATE users SET pssword = ? WHERE email = ?;');
if ($stmt->execute([$password, $email]))
  $status_passUpdate = true;
else
  $status_passUpdate = false;


echo json_encode(["status_passStrengh" => $status_passStrengh , "status_passUpdate" => $status_passUpdate]);