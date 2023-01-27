<?php

include("CssAndHtml/enter_code.html");
echo "<style>";
include("CssAndHtml/index.css");
echo "</style>";

?>


<?php

/*---------------------- generate the code and hash it  -----------------------*/

$activation_code = rand(0, 9999);
$hached_code = md5($activation_code); // to store it in DB

/*---------------------- insert the user in the DB -----------------------*/

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


if ($falg == 1) {

    $sql = 'INSERT INTO users(user_name, pssword, email, is_activated, activation_code, code_send_at, activation_expiry)
            VALUES(:username, :pssword, :email, :activated, :activation_code,:code_send_at,:activation_expiry)';

    $statement = $pdo()->prepare($sql);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', md5($password));
    $statement->bindValue(':email', $email);
    $statement->bindValue(':is_activated', 0);
    $statement->bindValue(':activation_code', $hached_code);
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));
}








/*---------------------- the message -----------------------*/
$subject = 'Please activate your account';
$message = " Hi,\n Please click the following link to activate your account" . $activation_code . "\n";
$header = "From: camagru web application";
//mail($email, $subject, nl2br($message), $header);



