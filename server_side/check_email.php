<?php

session_start();

if (isset($_GET["email"]) && isset($_GET["activation_code"])) {
    $email = $_GET["email"];
    $activation_code  = $_GET["activation_code"];
} else
    die('somethong is wrong');

$host = '127.0.0.1';
$db   = 'camagru';
$user = 'root';
$pass = 'lalagobiramos';
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

$stmt = $pdo->prepare("SELECT email from users where email = ?");
$stmt->execute([$email]);
$row1 = $stmt->fetch();

$stmt = $pdo->prepare("SELECT activation_code from users where activation_code = ?");
$stmt->execute([$activation_code]);
$row2 = $stmt->fetch();


if ($email == $row1["email"] && $activation_code = $row2["activation_code"]) {

    $stmt = $pdo->prepare("UPDATE users SET is_activated = '1' WHERE email = ?");
    $stmt->execute([$email]);
    echo "thank you for for ur time";
    header("location: ../index.php");
}
