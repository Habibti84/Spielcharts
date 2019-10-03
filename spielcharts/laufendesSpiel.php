<?php

session_start();
include("Code/dbConnect.php");
$gruppenname = $_SESSION['gruppenname'];
$username = $_SESSION['username'];
$_SESSION['gruppenname'] = $gruppenname;
$_SESSION['username'] = $username;

if(!isset($username)) {
  header('Location: index.php');
}

 ?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



  </body>
</html>
