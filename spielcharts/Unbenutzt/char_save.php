<?php
session_start();
include("Code/dbConnect.php");
$gruppenname = $_SESSION['gruppenname'];
$anzSpieler = $_SESSION['anzSpieler'];
$username = $_SESSION['username'];
$spielername;

if(!isset($username)) {
  header('Location: index.php');
}

$x = 0;
while($x )

?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main.css">

  <title>Charts</title>
</head>
<body>
  <header>
    <h1 id="tblH1"><?php echo $gruppenname; ?></h1>
    <table id="tbl">
      <thead>
        <tr class="tablehead">

          <?php

          //--spielernamen ausgeben--

          $x = 1;
          while($x <= $anzSpieler) {
            $spieler = "spieler" . $x;
            //echo $spieler;
            //es werde solange Spieler aus der Datenbank gezogen, wie in Anzahl spieler gespeichert sind
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

          echo "<div class='inpt'>";
          echo "<tr>";

          //--Spielername in Tabelle eintragen--
          if($result = $connect->query("SELECT * FROM $gruppenname")) {
            //echo "Tabelle existiert";

            //echo "Tabelle " . $gruppenname . " erstellt";
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

          }

          $x = 1;
          while($x <= $anzSpieler) {

            $x++;
          }

          ?>

          <form class="" action="chart.php" method="post">

            <?php

            //--Punkte eintragen--
            if(isset($_POST['submit'])) {

              echo "<tr>";

              $x = 1;
              while($x <= $anzSpieler) {
                $spieler = "spieler" . $x;

                if($result = $connect->query("SELECT $spieler FROM gruppennamen WHERE gruppenname = '$gruppenname'")){
                  if($result->num_rows > 0) {
                    //PROBLEM!!! -> id_gruppe sollte gezogen werden, damit abgeglichen werden kann, ob bereits ein Eintrag besteht

                    while(($row = $result->fetch_object())) {
                      $str = $row->$spieler;

                      if($eingabe = $_POST['eingabe' . $x]) {


                        echo "<td>$eingabe</td>";

                        if($query = $connect->query("INSERT INTO $gruppenname (username, $str, insertPoints) VALUES ('$username', '$eingabe', now())")){
                          echo "Daten eingetragen" . "<br>";
                        }
                        else {
                          echo "Daten nicht eingetragen<br>";
                          echo $connect->error;
                        }
                      }
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

              echo "</tr>";

            }
            else {
              echo "Submit not set";
            }

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
                      echo "ply:  $ply";

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
            echo "</tr>";
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



            /*function pullOutOfDB($spieler, $gruppenname) {
            if($result = $connect->query("SELECT $spieler FROM $gruppennamen")) {
            echo "Result: " . $result;
          }




        }*/

        //pullOutOfDB($spielername, $gruppenname);


        ?>
      </form>
    </body>
    </html>
