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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
    <title>Anzahl Spieler</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="logout.php">Logout</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="auswahl.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Auswahl
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="neuesSpiel_anzSpieler.php">Neues Spiel</a>
          <a class="dropdown-item" href="laufendesSpiel.php">Laufendes Spiel</a>
          <a class="dropdown-item" href="#">Statistik</a>
        </div>
      </li>
        </ul>
      </div>
    </nav>

  <div class="third">



<?php
  $anzSpieler = $_POST['anzSpieler'];





  echo '<form class="second" action="tabelle_gruppeErstellen.php" method="post">';
  echo '<input class="bottom" id="gruppenname" type="text" name="gruppenname" placeholder="Was möchtet ihr spielen?">';



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

<footer>
  <a href="http://www.regez-miniart.ch/scherenschnitte/index.html">
  <img src="Bilder/alpaufzug.jpg" alt="">
  </a>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
