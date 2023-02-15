<?php


function read_cb($ch, $fp, $length)
{
	return fread($fp, $length);
}

$fp = fopen('php://memory', 'r+');
$string = "From: <mailserverwebapp1337@gmail.com>\r\n";
$string .= "To: <omarderkaoui1337@gmail.com>\r\n";
$string .= "Date: " . date('r') . "\r\n";
$string .= "Subject: Test the php script to send msg\r\n";
$string .= "\r\n";
$string .= "hey omar i am u\r\n";
$string .= "\r\n";
fwrite($fp, $string);
rewind($fp);

$ch = curl_init();
curl_setopt_array($ch, [
	CURLOPT_URL => 'smtps://smtp.gmail.com:465',
	CURLOPT_MAIL_FROM => '<mailserverwebapp1337@gmail.com>',
	CURLOPT_MAIL_RCPT => ['<omarderkaoui1337@gmail.com>'],
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
