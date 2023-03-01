

<?php
session_start();
if (!isset($_POST['newusername']) || !isset($_POST['newpassword']) || !isset($_POST['email'])) {
    die('username and password are required');
}
/* chech if the user and email is already exist in database */

$host = '127.0.0.1';
$db   = 'camagru';
$user = 'oderkaou';
$pass = 'lalagobiramos1337';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$username = trim($_POST['newusername']);
$password = $_POST['newpassword'];
$email = $_POST['email'];

$stmt = $pdo->prepare("SELECT user_name from users WHERE user_name = ? ");
$stmt->execute([$username]);
$row = $stmt->fetch();

if ($username == $row['user_name'] ) {
    $_SESSION["error1"] = "AEN";
    header("location: create.php");
}

$stmt = $pdo->prepare("SELECT email from users where email = ?");
$stmt->execute([$email]);
$row = $stmt->fetch();

if ($email == $row['email']) {
    $_SESSION["error2"] = "AEE";
    header("location: create.php");
}

if ($username != $row['user_name'] && $email != $row['email'])
{
    $_SESSION["username"] = $username;
    $_SESSION["password"] = md5($password);
    $_SESSION["email"] = $email;
    header("location: email_verification.php");
}
