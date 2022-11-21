<?php
include("CssAndHtml/create_account.html");
echo "<style>";
include("CssAndHtml/index.css");
echo "</style>";


include("login.php");
session_start();
$right = 0;

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    die('username and password are required');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

/* check is the user name is good*/





/*  check is the user is alredy singin*/

$stmt = $pdo->prepare("SELECT user_name, pssword from users WHERE user_name = ? ");
$stmt->execute([$username]);
$row = $stmt->fetch();

?>