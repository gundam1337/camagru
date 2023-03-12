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
$pdo = $connection->creat_PDO();
$stmt = $pdo->prepare("SELECT email from users where email = ?");
$stmt->execute([$email]);
$row = $stmt->fetch();

if (!$row || $email != $row["email"]) {
  echo json_encode(["exists" => false]);
} else {
  $message = "<html>
              <head>
              <title>Welcome to My Website</title>
              </head>
              <body>
              <h1>Welcome!</h1>
              <p>Thank you for signing up to My Website.
                 Please click on the link below to activate your account:</p>
              <a href='https://www.mywebsite.com/activate.php?email=$to'>Activate</a>
              </body>
              </html>";
  $email_to_send =  new Email($email, $message);
  echo json_encode(["exists" => true]);
}
