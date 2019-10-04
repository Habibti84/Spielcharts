<?php
session_start();
include("Code/dbConnect.php");

$_referer = $_SERVER["HTTP_REFERER"];

if($_referer == 'http://localhost/spielcharts/spielcharts/laufendesSpiel.php' || $_referer == 'http://192.168.1.108/Spielcharts/spielcharts/laufendesSpiel.php') {
  $y = $_POST['counter'];
  $c = 1;
  while($c <= $y) {
    if(isset($_POST['submit'.$c])) {
      $gruppenname = $_POST['gruppenname'.$c];
      $anzSpieler = $_POST['anzSpieler'.$c];

    }
    $c++;
  }

}
else if($_referer == 'http://localhost/spielcharts/spielcharts/neuesSpiel_anzSpieler_response.php' || $_referer == 'http://localhost/spielcharts/spielcharts/chart.php' || $_referer == 'http://198.168.1.108/Spielcharts/spielcharts/neuesSpiel_anzSpieler_response.php' || $_referer == 'http://192.168.1.108/Spielcharts/spielcharts/chart.php') {
  $gruppenname = $_SESSION['gruppenname'];
  $anzSpieler = $_SESSION['anzSpieler'];
}

else {
  //header('Location: index.php');
}

$username = $_SESSION['username'];
$_SESSION['gruppenname'] = $gruppenname;
$_SESSION['anzSpieler'] = $anzSpieler;
$_SESSION['username'] = $username;


if(!isset($username)) {
  header('Location: index.php');
}



?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Charts</title>
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

  <header>
    <h1 id="tblH1"><?php echo $gruppenname; ?></h1>
  </header>
    <table id="tbl">
      <thead>
        <tr class="tablehead">

          <?php

          //---------spielernamen ausgeben

          $x = 1;
          while($x <= $anzSpieler) {
            $spieler = "spieler" . $x;
                        //es werde solange Spieler aus der grossen Datenbank, wo alle Gruppen aufgelistet sind, gezogen, wie in Anzahl spieler gespeichert sind
            if($result = $connect->query("SELECT $spieler FROM gruppennamen WHERE gruppenname = '$gruppenname'")){
              //wenn mehr als 0 Spieler gefunden wurden
              if($result->num_rows > 0) {
                //werden solange spieler/objekte gefetcht, bis $result 0 ist
                while(($row = $result->fetch_object())) {
                  $str = $row->$spieler;
                  echo "<th class = 'spieler'>" . $str . "</th>";
                }
              }
              else {
                echo "kein Eintrag gefunden";
              }
            }
            else {
              echo $connect->error;
            }
            $x++;
          }
          echo "</tr></thead>";



          echo "<tr>";

          //---------Ende spielernamen ausgeben


  ?>

  <form action="chart_response.php" method="post">

    <?php

    //Punkte aus Datenbank ausgeben
    if($result = $connect->query("SELECT * FROM spielstaende WHERE gruppenname = '$gruppenname'")) {
      if($result->num_rows > 0) {
        while($row = $result->fetch_object()) {
          echo "<tr class='pkt'>";
          $x = 1;
          while($x <= $anzSpieler) {
            $spieler = 'spieler' . $x;
            $ergebnis = $row->$spieler;
            echo "<td>$ergebnis</td>";
            $x++;
          }
          echo "</tr>";
        }

      }
    }

    else{
      echo $connect->error;
    }

    //Summe aller Punkte ausgeben
    echo "<tr class='sum'>";
    $x = 1;
    while($x <= $anzSpieler) {
      $spieler = "spieler" . $x;
      if($result = $connect->query("SELECT SUM($spieler) AS total FROM spielstaende WHERE gruppenname = '$gruppenname'")) {
        $tot = $result->fetch_object();
        $plytot = $tot->total;

        echo "<td><span>Total: $plytot</span></td>";
      }
      $x++;
    }
    echo "</tr>";

    //---------Input Felder & submit Button ausgeben
    echo "<tr class='input' >";
    $y = 1;
    while($y <= $anzSpieler) {
      echo "<td><input id='eingabe$y' class='eingabe' type='text' name='eingabe$y' ></td>";
      $y++;

    }


    echo "</tr></table>";
    echo "<form>";
    echo "</div>";
    echo "<input class='extraMarg btnEing btn btnSub' id='submit' type='submit' name='submit' value='Eintragen'>";













    ?>
  </form>

  <footer>
    <a href="http://www.regez-miniart.ch/scherenschnitte/index.html">
    <img src="Bilder/alpaufzug.jpg" alt="">
    </a>
  </footer>
  <script type="text/javascript" src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
