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
    $sum = $x;
    $sumSpieler = 'spieler' . $sum;
    echo $sumSpieler;
    if($x > 1) {
      if($result = $connect->query("UPDATE spielstaende SET $sumSpieler = $eingabe")){

              }
              else {
                echo "Weitere Daten nicht eingetragen<br>";
                echo $connect->error;
              }
    }
    else {
      if($result = $connect->query("INSERT INTO spielstaende (gruppenname, $spieler) VALUES ('$gruppenname', '$eingabe')")){

              }
              else {
                echo "1. Daten nicht eingetragen<br>";
                echo $connect->error;
              }
    }

            $x++;
          }




  }
  header('Location: chart.php');


 ?>
