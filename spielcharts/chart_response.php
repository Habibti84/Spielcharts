<?php
session_start();
include("Code/dbConnect.php");
$gruppenname = $_SESSION['gruppenname'];
$anzSpieler = $_SESSION['anzSpieler'];
$test = $_POST['test'];
echo $test;



if(isset($_POST['submit'])) {
  echo "Drin<br>";
  $x = 1;
  while($x <= $anzSpieler) {
    $spieler = "spieler" . $x;
    echo $spieler;
    if($result = $connect->query("SELECT $spieler FROM gruppennamen WHERE gruppenname = '$gruppenname'")){
      if($result->num_rows > 0) {
        while(($row = $result->fetch_object())) {
          $str = $row->$spieler;
          if($_POST['eingabe' . $x] == NULL){
            printf($_POST['eingabe' . $x]);
          }
          if(!empty($eingabe = $_POST['eingabe' . $x])) {

            if($query = $connect->query("INSERT INTO $gruppenname ($str) '$eingabe'")){
              echo "Daten eingetragen";
            }
            else {
              echo "Daten nicht eingetragen";
              echo $connect->error;
            }
          }

          echo "eingabe stimmt nicht";
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
}
else {
  echo "submit not set";
}

//header('Location: chart.php');


?>
