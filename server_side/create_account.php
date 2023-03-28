

<?php
session_start();
if (!isset($_POST['newusername']) || !isset($_POST['newpassword']) || !isset($_POST['email'])) {
    die('username and password are required');
}
/* chech if the user and email is already exist in database */

require("classes/database_class.php");

$username = trim($_POST['newusername']);
$password = $_POST['newpassword'];
$email = $_POST['email'];

$connection = new Database();

$stmt = $connection->creat_PDO()->prepare("SELECT user_name from users WHERE user_name = ? ");
$stmt->execute([$username]);
$row = $stmt->fetch();

if ($username == $row['user_name'] ) {
    $_SESSION["error1"] = "AEN";
    header("location: create.php");
}

$stmt = $connection->creat_PDO()->prepare("SELECT email from users where email = ?");
$stmt->execute([$email]);
$row = $stmt->fetch();

if ($email == $row['email']) {
    $_SESSION["error2"] = "AEE";
    header("location: create.php");
}