<?php
session_start();
include("Code/dbConnect.php");

$username = $_SESSION['username'];
$_SESSION['username'] = $username;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <title>Anzahl Spieler</title>
  </head>
  <body>

  <div class="third">



<?php
  $anzSpieler = $_POST['anzSpieler'];




  echo '<form class="second" action="tabelle_gruppeErstellen.php" method="post">';
  echo '<input id="gruppenname" type="text" name="gruppenname" placeholder="Gruppenname">';



  $_SESSION['anzSpieler'] = $anzSpieler;
  $x = 1;
  while($x <= $anzSpieler) {

    echo '<input class="bottom" type="text" name="spieler' . $x . '" placeholder="Spieler ' . $x . '">';
    $x++;
    }

    echo '<input class="btn" type="submit" name="weiter" value="Weiter">';
    echo '</form>';




 ?>

</div>

</body>
</html>
