<?php

session_start();
include("Code/dbConnect.php");

$userName = str_replace(" ", "", $_POST["userName"]);
$password = $_POST["password"];
$_SESSION['username'] = $userName;






$query = $connect->query("SELECT * FROM userdata
WHERE username LIKE '$userName'");
if(mysqli_num_rows($query)>=1) {


  if ($query = $connect->query("SELECT password FROM userdata WHERE username = '$userName'"))
  {
    if ($query->num_rows > 0)
    {
      $row = $query->fetch_object();
      $pwd = $row->password;
      //echo $pwd;

    }
    else {
      echo "Row failed";
    }

}

else {
  echo "Query failed";
}


  if(password_verify($password, $pwd)) {
    header("Location: auswahl.php");
  }

  else {
    echo "<SCRIPT type='text/javascript'> //not showing me this
    alert('Passwort falsch');
    window.location.replace(\"index.php\");
    </SCRIPT>";
  }

}

else {
  echo "<SCRIPT type='text/javascript'> //not showing me this
  alert('Benutzername existiert nicht');
  window.location.replace(\"index.php\");
  </SCRIPT>";
}


 ?>
