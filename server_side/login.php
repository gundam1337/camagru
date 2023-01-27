<?php

session_start();

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

function authenticate($username, $password, $pdo)
{
    $stmt = $pdo->prepare("SELECT user_name, pssword from users WHERE user_name = ? ");
    $stmt->execute([$username]);
    $row = $stmt->fetch();
    if ($username == $row['user_name'] && $password == $row['pssword']) {
        $_SESSION["username"] = $username;
        return (true);
    } else {
        $_SESSION["error"] = "error";
        return (false);
    }
}

if (!isset($_POST['username'], $_POST['password'])) {
    die('username and password are required');
}
$username = $_POST['username'];
$password = md5($_POST['password']);
if (authenticate($username, $password,$pdo)) {
    echo "wellcome \n";
} else {
    $_SESSION["error"] = "error";
    header("location: ../index.php");
}
$pdo = null;