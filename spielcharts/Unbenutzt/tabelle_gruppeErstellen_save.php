<?php
session_start();
include("Code/dbConnect.php");

$gruppenname = trim($_POST["gruppenname"]);
$anzSpieler = trim($_SESSION["anzSpieler"]);
echo $anzSpieler;





if(isset($_POST["spieler1"])) {
  $spieler1 = str_replace(" ", "", $_POST["spieler1"]);
  echo '<table><tr><th>' . $spieler1 . '<th>';

  if(isset($_POST["spieler2"])) {
    $spieler2 = str_replace(" ", "", $_POST["spieler2"]);
    echo '<th>' . $spieler2 . '<th>';


  }
  else {
    echo "Spieler 2 fehlt";
  }
}
else {
  echo "Spieler 1 fehlt";
}


if (isset($_POST["gruppenname"])){
  if($query = $connect->query("CREATE TABLE $gruppenname (
    $spieler1 VARCHAR (20),
    $spieler2 VARCHAR (20))")) {

      if(isset($_POST["spieler3"])) {
        $spieler3 = str_replace(" ", "", $_POST["spieler3"]);
        if($query = $connect->query("ALTER TABLE $gruppenname ADD COLUMN $spieler3 VARCHAR (20)")){
          echo '<th>' . $spieler3 . '<th>';
        }
        else {
          echo "Query nicht ok";
        }
      }


      if(isset($_POST["spieler4"])) {
        $spieler4 = $_POST["spieler4"];
        $querry = $connect->query("ALTER TABLE $gruppenname
          ADD COLUMN $spieler4 VARCHAR (20)");
          echo '<th>' . $spieler4 . '<th>';
      }


      if(isset($_POST["spieler5"])) {
        $spieler5 = $_POST["spieler5"];
        $querry = $connect->query("ALTER TABLE $gruppenname
          ADD COLUMN $spieler5 VARCHAR (20)");
          echo '<th>' . $spieler5 . '<th>';
      }


      if(isset($_POST["spieler6"])) {
        $spieler6 = $_POST["spieler6"];
        $querry = $connect->query("ALTER TABLE $gruppenname
          ADD COLUMN $spieler6 VARCHAR (20)");
          echo '<th>' . $spieler6 . '<th>';
      }


      if(isset($_POST["spieler7"])) {
        $spieler7 = $_POST["spieler7"];
        $querry = $connect->query("ALTER TABLE $gruppenname
          ADD COLUMN $spieler7 VARCHAR (20)");
          echo '<th>' . $spieler7 . '<th>';
      }


      if(isset($_POST["spieler8"])) {
        $spieler8 = $_POST["spieler8"];
        $querry = $connect->query("ALTER TABLE $gruppenname
          ADD COLUMN $spieler8 VARCHAR (20)");
          echo '<th>' . $spieler8 . '<th>';
      }

    echo "<tr><table>"
    echo "Tabelle erstellt";
  }
  else {
    echo "Tabelle nicht erstellt, Fehler: " . $connect->error;
  }




}
else {
  echo "Gruppenname nicht vorhanden";
}




?>
