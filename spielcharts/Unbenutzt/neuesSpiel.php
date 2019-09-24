<?php
session_start();
include("Code/dbConnect.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <title>Neues Spiel</title>
  </head>
  <body>

    <h1>Neues Spiel</h1>



    <form class="second" action="neuesSpiel_response.php" method="post">


      <input type="text" name="gruppenname" placeholder="Name der Spielgruppe">

      <label class="bottom" for="anzSpieler">Anzahl Spieler:</label>
      <select class="btn" name="anzSpieler">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
      </select>

       <input class="btn" type="submit" name="weiter" value="Weiter">



    </form>



    <footer>
      <a href="http://www.regez-miniart.ch/scherenschnitte/index.html">
      <img src="Bilder/alpaufzug.jpg" alt="">
      </a>
    </footer>

  </body>
</html>
