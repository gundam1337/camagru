<?php

session_start();
$flag = 1;


/* echo $_POST["newusername"] . "\n";
echo $_POST["newpassword"] . "\n";
echo $_POST["email"] . "\n";
 */

if (!isset($_POST['newusername']) || !isset($_POST['newpassword']) || !isset($_POST['email'])) {
    die('username and password are required');
}

$username = trim($_POST['newusername']);
$password = $_POST['newpassword'];
$email = $_POST['email'];


/* chech the user name format*/
function validate_string($username): bool
{

    $i = 0;
    $status = 0;
    while ($i < strlen($username)) {
        if (preg_match('/[A-Za-z]/', $username[$i]) || preg_match('/[0-9]/', $username[$i]) || $username[$i] == '_')
            $status = 1;
        else
            return false;
        $i++;
    }
    if ($status == 1)
        return true;
    return false;
}

if (validate_string($username) == 0) {
    $_SESSION["error1"] = "UNFW";
    header("location: create.php");
    $flag = 0;
}

/* chech if the user is already exist*/

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


$stmt = $pdo->prepare("SELECT user_name from users WHERE user_name = ? ");
$stmt->execute([$username]);
$row = $stmt->fetch();

if ($username == $row['user_name']) {
    $_SESSION["error2"] = "AE";
    header("location: create.php");
    $flag = 0;
}

/* check the email foramt && if the email already exist */

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["error3"] = "IEF";
    header("location: create.php");
    $flag = 0;
}

$stmt = $pdo->prepare("SELECT email from users where email = ?");
$stmt->execute([$email]);
$row = $stmt->fetch();

if ($email == $row['email']) {
    $_SESSION["error4"] = "EE";
    header("location: create.php");
    $flag = 0;
}

if ($flag == 1)
{
    header("location: email_verification.php");
}