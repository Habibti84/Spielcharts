<?php
session_start();
include("Code/dbConnect.php");
$gruppenname = $_SESSION['gruppenname'];
$anzSpieler = $_SESSION['anzSpieler'];
$username = $_SESSION['username'];
$_SESSION['gruppenname'] = $gruppenname;
$_SESSION['anzSpieler'] = $anzSpieler;
$_SESSION['username'] = $username;
$spielername;

if(!isset($username)) {
  header('Location: index.php');
}



?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style/main.css">
  <title>Charts</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="auswahl.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Auswahl
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="neuesSpiel_anzSpieler.php">Neues Spiel</a>
        <a class="dropdown-item" href="#">Laufendes Spiel</a>
        <a class="dropdown-item" href="#">Statistik</a>
      </div>
    </li>
      </ul>
    </div>
  </nav>

  <header>
    <h1 id="tblH1"><?php echo $gruppenname; ?></h1>
    <table id="tbl">
      <thead>
        <tr class="tablehead">

          <?php

          //---------spielernamen ausgeben

          $x = 1;
          while($x <= $anzSpieler) {
            $spieler = "spieler" . $x;
            //echo $spieler;
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
          echo "</header>";


          echo "<tr>";

          //---------Ende spielernamen ausgeben

          //--Spielername in Tabelle eintragen--
          /*if($result = $connect->query("SELECT * FROM $gruppenname")) {

          $x = 1;
          while($x <= $anzSpieler) {
          $spieler = "Spieler" .$x;
          //echo $spieler;
          $result = $connect->query("SELECT $spieler FROM gruppennamen");
          if($result->num_rows > 0) {
          $row = $result->fetch_object();
          $spielername = $row->$spieler;
          //echo "$spielername";
        }
        $result = $connect->query("ALTER TABLE $gruppenname ADD COLUMN $spielername VARCHAR(30) ");
        //$result = $connect->query("INSERT INTO $gruppenname ($spieler) VALUES '$spielername' WHERE username = '$username'");
        $x++;
      }

    }
    else {
    echo $gruppenname . " existiert nicht";

  }*/



  ?>

  <form class="" action="chart_response.php" method="post">

    <?php



/*
    if(isset($_POST['submit'])) {

      echo "<tr>";

      $x = 1;
      while($x <= $anzSpieler) {
        $spieler = "spieler" . $x;

        if($result = $connect->query("SELECT $spieler FROM gruppennamen WHERE gruppenname = '$gruppenname'")){
          if($result->num_rows > 0) {
            //PROBLEM!!! -> id_gruppe sollte gezogen werden, damit abgeglichen werden kann, ob bereits ein Eintrag besteht

            while(($row = $result->fetch_object())) {
              $ply = $row->$spieler;
              echo "ply:  $ply<br>";

              if($punkte = $connect->query("SELECT $ply FROM $gruppenname WHERE $ply IS NOT NULL")) {

                print_r($punkte);
                if($punkte->num_rows > 0) {
                  while(($ptRow = $punkte->fetch_object())) {
                    echo $str;
                    $pkt = $ptRow->$str;


                    echo "<td>$ply $pkt</td>";
                    echo "</tr>";
                  }
                }
              }
              echo $connect->error;
            }

            if($sum = $connect->query("SELECT SUM($ply) AS total FROM $gruppenname")) {


              $tot = $sum->fetch_object();
              $plytot = $tot->total;
              print_r($plytot);
              echo "<td>Total: $plytot</td>";


            }
          }
          else {
            echo "kein Eintrag gefunden <br>";
          }
        }
        else {
          echo $connect->error;
        }
        $x++;
      }
    }

    else {
      echo "submit not set";
    }
    echo "</tr>";*/
    echo "<tr>";


    $y = 1;
    while($y <= $anzSpieler) {
      echo "<td><input class='eingabe' type='text' name='eingabe$y' value='' placeholder=''></td>";
      $y++;

    }


    echo "</tr></table>";
    echo "<form>";
    echo "</div>";
    echo "<input id='submit' type='submit' name='submit' value='Eintragen'>";













    ?>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
