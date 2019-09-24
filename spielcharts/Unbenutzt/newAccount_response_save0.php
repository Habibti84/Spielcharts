<?php

session_start();
include("Code/dbConnect.php");

$userName = $_POST["userName"];
$password = $_POST["password"];
$passwordRep = $_POST["passwordRep"];


if (isset($_POST["logIn"])) {

  if($connect->query("SELECT * FROM userdata") == false) {
    $query = $connect->query("CREATE TABLE userdata (username VARCHAR(30), password VARCHAR(255))");
    echo $connect->error;
    echo "Query: " . $query;
  }

  else {

    if($userName && $password && $passwordRep) {


      $query = $connect->query("SELECT * FROM userdata WHERE username = '$userName'");
      if(mysqli_num_rows($query)>=1)  {
        echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Benutzername vergeben');
        window.location.replace(\"newAccount.php\");
        </SCRIPT>";
        }

        else {
          echo "Username frei";
          if($password == $passwordRep) {

            $password = password_hash($password, PASSWORD_DEFAULT);
            echo $password;

            if($query = $connect->query("INSERT INTO userdata VALUES('$userName', '$password')")) {

              header("Location: auswahl.php");
            }
          }
          else {
            echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('Passwörter müssen übereinstimmen');
            window.location.replace(\"newAccount.php\");
            </SCRIPT>";
          }
      }
    }
    else {
      echo "<SCRIPT type='text/javascript'> //not showing me this
      alert('Alle Felder müssen ausgefüllt sein');
      window.location.replace(\"newAccount.php\");
      </SCRIPT>";
    }
  }
}
else {
  echo "submit problem";
}




 ?>
