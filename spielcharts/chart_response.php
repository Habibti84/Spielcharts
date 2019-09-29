<?php
session_start();
include("Code/dbConnect.php");
$gruppenname = $_SESSION['gruppenname'];
$anzSpieler = $_SESSION['anzSpieler'];
$username = $_SESSION['username'];
$spielername;





?>



          <?php






          ?>

          <form class="" action="chart_response.php" method="post">

            <?php

            //---------Punkte eintragen
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
                          print("Daten eingetragen" . "<br>");
                          header ('Location: chart.php');
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

            //---------Ende Punkte eintragen

            /*if(isset($_POST['submit'])) {

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
            echo "</tr>";*/
















        ?>
      </form>
    </body>
    </html>
