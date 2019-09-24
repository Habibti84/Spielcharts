<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <title>Neuer Account</title>
  </head>
  <body>

    <h1>Neues Konto erstellen</h1>

    <form id="login" action="newAccount_response_save.php" method="post">
      <input type="text" name="username" placeholder="Benutzername">
      <input type="password" name="password" placeholder="Passwort (min 6 Zeichen)">
      <input type="password" name="passwordRep" placeholder="Passwort bestätigen">
      <input id="btn" type="submit" name="logIn" value="Erstellen">
    </form>

    <footer>
      <a href="http://www.regez-miniart.ch/scherenschnitte/index.html">
      <img src="Bilder/alpaufzug.jpg" alt="">
      </a>
    </footer>

  </body>
</html>
