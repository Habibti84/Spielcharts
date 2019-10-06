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


//--Punkte eintragen--
if(isset($_POST['submit'])) {



  $x = 1;
  while($x <= $anzSpieler) {
    $spieler = "spieler" . $x;
    $eingabe = $_POST['eingabe' . $x];

    $name = $eingabe;
    if(preg_match('/[0-9]/', $name)) {
      $sum = $x;
      $sumSpieler = 'spieler' . $sum;
      echo $sumSpieler;
      if($x > 1) {
        if($result = $connect->query("UPDATE spielstaende SET $sumSpieler = $eingabe WHERE $sumSpieler IS NULL")){

        }
        else {
          echo "Weitere Daten nicht eingetragen<br>";
          echo $connect->error;
        }
      }
      else {
        if($result = $connect->query("INSERT INTO spielstaende (gruppenname, anzSpieler, $spieler) VALUES ('$gruppenname', '$anzSpieler', '$eingabe')")){

        }
        else {
          echo "1. Daten nicht eingetragen<br>";
          echo $connect->error;
        }
      }

    }

    else {
      echo "<script>console.log('kein match');</script>";
    }



    $x++;
  }


header('Location: chart.php');
}



?>
