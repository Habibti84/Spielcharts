<?php
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <title>Spiel Auswahl</title>
  </head>
  <body>

    <div class="onlyButtons">


      <a href="neuesSpiel_anzSpieler.php">
      <button class="btn" type="submit" name="neuesSpiel" value="Neues Spiel">Neues Spiel</button>
      </a>
      <a href="laufendesSpiel.php">
      <button class="btn" type="submit" name="laufendesSpiel" value="Laufendes Spiel">Laufendes Spiel</button>
      </a>
      <a href="statistik.php">
      <button class="btn" type="submit" name="statistik" value="Statistik">Statistiken</button>
      </a>

    </div>


    <footer>
      <a href="http://www.regez-miniart.ch/scherenschnitte/index.html">
      <img src="Bilder/alpaufzug.jpg" alt="">
      </a>
    </footer>

  </body>
</html>
