<?php
session_start();
include("Code/dbConnect.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <title>Spielgruppe</title>
  </head>
  <body>

  <div class="third">



<?php

$anzSpieler = $_SESSION['anzSpieler'];
$gruppenname = $_SESSION['gruppenname'];


//boolean $spieler = true;


for($i = 1; $i < $anzSpieler + 1; $i++) {

  $spieler = $_POST['spieler' . $i];

  echo $spieler;


  if($spieler) {

    echo $spieler;



    if ($result1 = $connect->query(
      "UPDATE saved_games
      SET spieler". $i ."='$spieler'
      WHERE gruppenname = '$gruppenname'"))
      {




    }

    else {

      echo "Query 2 failed<br>";
      echo $connect->error;
    }

  }

  else {
    $spieler = false;
    echo "No player";
    break;




  }
}

  if($spieler == false) {



  $theForm = <<<THEFORM

   <h1>$gruppenname</h1>;

   <form class="second" action="neuesSpiel_response2.php" method="post">;


  $x = 1;
  while($x < $anzSpieler +1) {

     <input class="bottom" type="text" name="spieler . $x . " placeholder="Spieler  . $x . ">;
    $x++;
    }

     <input class="btn" type="submit" name="weiter" value="Weiter">;
     </form>;

  <p>Spieler . $i . braucht einen Namen</p>



  <footer>
    <a href="http://www.regez-miniart.ch/scherenschnitte/index.html">
    <img src="Bilder/alpaufzug.jpg" alt="">
    </a>
  </footer>




THEFORM;

echo $theForm;

}

 ?>

</div>

</body>
</html>
