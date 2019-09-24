<?php

session_start();
include("Code/dbConnect.php");

$userName = $_POST["userName"];
$password = $_POST["password"];
$passwordRep = $_POST["passwordRep"];


if (isset($_POST["logIn"])) {

  if($userName && $password && $passwordRep) {

    if ($query = $connect->query("SELECT * FROM $userName"))  {

      echo "Username vergeben";
      }


    else {
      echo "Username frei";

      if(strlen($password) > 5) {
      if($password === $passwordRep) {

        if($query = $connect->query("CREATE TABLE $userName (

          Username varchar(15),
          Password varchar(15),
          PasswordRep varchar(15),
          Gruppenname varchar(30),
          Spieler1 varchar(15),
          Spieler2 varchar(15),
          Spieler3 varchar(15),
          Spieler4 varchar(15),
          Spieler5 varchar(15),
          Spieler6 varchar(15),
          Spieler7 varchar(15),
          Spieler8 varchar(15)
        )")) {

          if($query1 = $connect->query("INSERT INTO $userName (Username, Password, PasswordRep) VALUES ('$userName', '$password', '$passwordRep')"))
          {
            header("Location: auswahl.php");
          }

          else {
            echo "Query1 failed";          }


        }

        else {
          echo "connection failed";
        }



  }

  else {
    echo "Passwort und PasswortRep müssen übereinstimmen";
  }

}
else {
  echo "Passwort muss mind sechs Zeichen enthalten";
}

}
}


  else {
    echo "Benutzername und Passwort eingeben";
  }

}
else {
  echo "submit problem";
}




 ?>
