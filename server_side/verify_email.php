<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
require_once("classes/database_class.php");
require_once("classes/email_class.php");

// Get the email address from JavaScript
$email_data = json_decode(file_get_contents('php://input'), true);
$email = $email_data["email"];

// Check if the email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(["error" => "Invalid email address"]);
  exit;
}

$connection = new Database();
$stmt = $connection->creat_PDO()->prepare("SELECT email from users where email = ?");
$stmt->execute([$email]);
$row = $stmt->fetch();

if (!$row || $email != $row["email"]) {
  echo json_encode(["exists" => false]);
  exit;
} else {
  $token = md5(rand(-9000000, 9000000));
  // Check if a record with the specified email already exists
  $stmt = $connection->creat_PDO()->prepare('SELECT * FROM password_reset WHERE email = ?');
  $stmt->execute([$email]);


  if ($stmt->rowCount() > 0) {
    echo json_encode(["exists" => true]);
    exit();
  } else {
    // Record doesn't exist, insert new record
    $stmt = $connection->creat_PDO()->prepare('INSERT INTO password_reset (`email`, `key`, `expDate`) VALUES (?, ?, ?)');
    $stmt->execute([$email, $token, date('Y-m-d H:i:s', strtotime('+1 hour'))]);
  }


  $key_email = md5($email);
  $reset_link = "http://camagru.nginx/server_side/new_password.php?token=$token&key=$key_email";
  $message = "<html>
              <head>
              <title>Welcome to My Website</title>
              </head>
              <body>
              <h1>Welcome!</h1>
              <p>Thank you for signing up to My Website.
                 Please click on the link below to activate your account:</p>
              <a href='$reset_link'>Activate</a>
              </body>
              </html>";
  $email_to_send =  new Email($email, $message);
  $email_to_send->send_email();
  echo json_encode(["exists" => true]);
}
