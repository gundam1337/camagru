<?php
// this is a stupid a script to be honest 
// the real goal of this script is just ot make sure the email is active 
session_start();
require("classes/database_class.php");


  $token = $_GET['token'];
  $key_email = $_GET['key'];
  $current_time = time();
  $connection = new Database();

  $stmt = $connection->creat_PDO()->prepare('SELECT * FROM password_reset WHERE `key` = ?');
  $stmt->execute([$token]);
  $row = $stmt->fetch();
  $stored_time = strtotime($row["expDate"]);
  $email = $row["email"];
  $time_diff = $current_time - $stored_time;
  if (md5($row["email"]) == $key_email && $row["key"] == $token && $time_diff < 3600)
  {
    $_SESSION["token"] = $token;
    $_SESSION["key"] = $key_email;
    
    header("Location: http://camagru.nginx/CssAndHtml/new_password.php");
    $_SESSION["token"] = $token;
    $_SESSION["key"] = $key_email;
    exit;
  }else {
    header("Location: ../CssAndHtml/smthg_went_wrong.html");
    exit;
  }

