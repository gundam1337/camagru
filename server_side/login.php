<?php

session_start();

require("classes/database_class.php");


function authenticate($username, $password, $pdo)
{
    $connection = new Database();

    $stmt = $connection->creat_PDO()->prepare("SELECT user_name, pssword , is_activated from users WHERE user_name = ? ");
    $stmt->execute([$username]);
    $row = $stmt->fetch();
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
