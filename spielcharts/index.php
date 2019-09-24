<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <title>Login</title>
  </head>

  <body>

    <h1>Spiel Charts</h1>

    <form class="first" action="index_response.php" method="post">
      <input type="text" name="userName" placeholder="Benutzername">
      <input type="password" name="password" placeholder="Passwort">
      <input class="btn" type="submit" name="logIn" value="Login">
    </form>

    <form class="second" action="newAccount.php" method="post">
      <label class="bottom" for="">Noch kein Account?</label>

      <input class="btn" type="submit" name="logIn" value="Neuer Account">

    </form>

    <footer>
      <a href="http://www.regez-miniart.ch/scherenschnitte/index.html" target="_blank">
      <img src="Bilder/alpaufzug.jpg" alt="">
      </a>
    </footer>

  </body>
</html>
