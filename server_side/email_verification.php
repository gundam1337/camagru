
<?php

session_start();


$username = $_SESSION["username"];
$password = $_SESSION["password"];
$email = $_SESSION["email"];
$activation_code = md5(rand());
$is_active = 0;

/* ----------------------------------- store the user as inactive user ------------------------*/
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

$stmt = $pdo->prepare("INSERT INTO`users` (`user_name`,`pssword`,`email`,`is_activated` ,`activation_code`)
VALUES (?,?,?,?,?);");
$stmt->execute([$username,$password,$email,$is_active,$activation_code]);


/*------------------------------ send verfication code -----------------------------*/
$str = "http://camagru.nginx/server_side/check_email.php";
$activation_link = $str."?email=$email&activation_code=$activation_code"; 
function read_cb($ch, $fp, $length)
{
	return fread($fp, $length);
}

$fp = fopen('php://memory', 'r+');
$string = "From: <mailserverwebapp1337@gmail.com>\r\n";
$string .= "To: $email\r\n";
$string .= "Date: " . date('r') . "\r\n";
$string .= "Subject: Please activate your account\r\n";
$string .= "\r\n";
$string .= "Hi,
Please click the following link to activate your account:
$activation_link\r\n";
$string .= "\r\n";
fwrite($fp, $string);
rewind($fp);

$ch = curl_init();
curl_setopt_array($ch, [
	CURLOPT_URL => 'smtps://smtp.gmail.com:465',
	CURLOPT_MAIL_FROM => '<mailserverwebapp1337@gmail.com>',
	CURLOPT_MAIL_RCPT => [$email],
	CURLOPT_USERNAME => 'mailserverwebapp1337@gmail.com',
	CURLOPT_PASSWORD => 'cucjvikcxdzdkugi',
	CURLOPT_USE_SSL => CURLUSESSL_ALL,
	CURLOPT_READFUNCTION => 'read_cb',
	CURLOPT_INFILE => $fp,
	CURLOPT_UPLOAD => true,
	CURLOPT_VERBOSE => true,
]);

$x = curl_exec($ch);

if ($x === false) {
	echo curl_errno($ch) . ' = ' . curl_strerror(curl_errno($ch)) . PHP_EOL;
}

curl_close($ch);
fclose($fp);
 
echo "please check your email";

