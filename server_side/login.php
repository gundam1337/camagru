<?php

session_start();

require("classes/database_class.php");
// $host = '127.0.0.1';
// $db   = 'camagru';
// $user = 'oderkaou';
// $pass = 'lalagobiramos1337';
// $charset = 'utf8mb4';

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// try {
//     $pdo = new PDO($dsn, $user, $pass, $options);
// } catch (\PDOException $e) {
//     throw new \PDOException($e->getMessage(), (int)$e->getCode());
// }


function authenticate($username, $password, $pdo)
{
    $connection = new Database();

    $stmt = $connection->creat_PDO()->prepare("SELECT user_name, pssword , is_activated from users WHERE user_name = ? ");
    $stmt->execute([$username]);
    $row = $stmt->fetch();
    //echo "user info : ".$row['user_name']." ".$row['pssword']." ".$row['is_activated'];
    if ($username == $row['user_name'] && $password == $row['pssword'] && $row['is_activated'] == "1") {
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
if (authenticate($username, $password, $pdo)) {
    echo "wellcome \n";
    exit;
} else {
    $_SESSION["error"] = "error";
    header("location: ../index.php");
}
$pdo = null;
