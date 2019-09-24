<?php
session_start();
include("Code/dbConnect.php");

$gruppenname = trim($_POST["gruppenname"]);
$gruppenname = mysqli_real_escape_string($connect, $gruppenname);
$_SESSION['gruppenname'] = $gruppenname;
$anzSpieler = $_SESSION["anzSpieler"];
$_SESSION['anzSpieler'] = $anzSpieler;
$username = $_SESSION['username'];
$_SESSION['username'] = $username;
echo $gruppenname;





if($query = $connect->query("SELECT * FROM gruppennamen")) {

  $query = $connect->query("INSERT INTO gruppennamen (gruppenname, username) VALUES ('$gruppenname', '$username')");

  if(isset($_POST["spieler1"])) {
    $spieler1 = str_replace(" ", "", $_POST["spieler1"]);
    $query = $connect->query("UPDATE gruppennamen SET spieler1 = '$spieler1' WHERE gruppenname = '$gruppenname'");

    if(isset($_POST["spieler2"])) {
      $spieler2 = str_replace(" ", "", $_POST["spieler2"]);
      $query = $connect->query("UPDATE gruppennamen SET spieler2 = '$spieler2' WHERE gruppenname = '$gruppenname'");


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
      id_gruppe int NOT NULL AUTO_INCREMENT,
      username VARCHAR(30),
      $spieler1 VARCHAR(30),
      $spieler2 VARCHAR(30),
      PRIMARY KEY (id_gruppe),
      FOREIGN KEY (username) REFERENCES userdata(username))")) {

        if(isset($_POST["spieler3"])) {
          $spieler3 = str_replace(" ", "", $_POST["spieler3"]);
          $query = $connect->query("UPDATE gruppennamen SET spieler3 = '$spieler3' WHERE gruppenname = '$gruppenname'");
        }


        if(isset($_POST["spieler4"])) {
          $spieler4 = $_POST["spieler4"];
          $query = $connect->query("UPDATE gruppennamen SET spieler4 = '$spieler4' WHERE gruppenname = '$gruppenname'");
        }


        if(isset($_POST["spieler5"])) {
          $spieler5 = $_POST["spieler5"];
          $query = $connect->query("UPDATE gruppennamen SET spieler5 = '$spieler5' WHERE gruppenname = '$gruppenname'");
        }


        if(isset($_POST["spieler6"])) {
          $spieler6 = $_POST["spieler6"];
          $query = $connect->query("UPDATE gruppennamen SET spieler6 = '$spieler6' WHERE gruppenname = '$gruppenname'");
        }


        if(isset($_POST["spieler7"])) {
          $spieler7 = $_POST["spieler7"];
          $query = $connect->query("UPDATE gruppennamen SET spieler7 = '$spieler7' WHERE gruppenname = '$gruppenname'");
        }


        if(isset($_POST["spieler8"])) {
          $spieler8 = $_POST["spieler8"];
          $query = $connect->query("UPDATE gruppennamen SET spieler8 = '$spieler8' WHERE gruppenname = '$gruppenname'");
        }

      echo "<tr><table>";
      header("Location: chart.php");
      echo "Tabelle erstellt";
    }
    else {
      echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('Gruppenname vergeben');
      window.location.replace(\"neuesSpiel_anzSpieler.php\");
      </SCRIPT>";
      //echo "Tabelle nicht erstellt, Fehler: " . $connect->error;
    }




  }
  else {
    echo "Gruppenname nicht vorhanden";
  }

}

else {
  $query = $connect->query("CREATE TABLE gruppennamen (gruppenname VARCHAR(30), username VARCHAR(30), spieler1 VARCHAR(30), spieler2 VARCHAR(30), spieler3 VARCHAR(30), spieler4 VARCHAR(30), spieler5 VARCHAR(30), spieler6 VARCHAR(30), spieler7 VARCHAR(30), spieler8 VARCHAR(30), PRIMARY KEY (gruppenname), FOREIGN KEY (username) REFERENCES userdata (username))");


}



?>
