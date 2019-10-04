<?php
session_start();
session_unset();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/13c7738e3b.js"></script>
  <link rel="stylesheet" href="style/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Login</title>
</head>

<body>

  <h1 class="title" >Spiel Charts</h1>

  <form class="first" action="index_response.php" method="post">
    <input class="userN" min_Len="3" type="text" name="userName" placeholder="Benutzername">
    <p id="pUser"></p>
    <input class="passW" min_Len="6" type="password" name="password" placeholder="Passwort">
    <p id="pPw"></p>
    <input class="btnSub btn" type="submit" name="logIn" value="Login">
    <p id="pPwRpt"></p>
  </form>

  <form class="second" action="newAccount.php" method="post">
    <label class="bottom" for="logIn">Noch kein Account?</label>

    <input class="btn" type="submit" name="logIn" value="Neuer Account">

  </form>

  <footer>
    <a href="http://www.regez-miniart.ch/scherenschnitte/index.html" target="_blank">
    <img src="Bilder/alpaufzug.jpg" alt="">
    </a>
  </footer>

  <script type="text/javascript" src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
