<?php
//SQL

session_name("timlshop");
session_start();
// $logged_in = $_SESSION['logged_in'];
// if($logged_in == true) {
//   header('Location: index.php');
// }
//Wie kann man das Lösen?

// var_dump($_SESSION);

if ((isset($_POST['email-input']) and  isset($_POST['resolution-input']) and isset($_POST['os-input']) and isset($_POST['datetime-input']) and isset($_POST['hash-input']))) {

  try {
    // Datenbank settings
    $datenbankname = "timl";
    $benutzername = "tim";
    $benutzerpasswort = "q9Xlx6Hk7Vpl";
    $servername = "chelex.life";

    $sEmail = $_POST['email-input'];
    $sResolution = $_POST['resolution-input'];
    $sOs = $_POST['os-input'];
    $sDatetime = $_POST['datetime-input'];
    $sPwdHash = $_POST["hash-input"];
    $sActive = 1;


    // Verbindung zur Datenbank
    $conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL
    // Login Daten überprüfen
    $sqlGetUserInfo = "SELECT email,pwd FROM user WHERE email=?";
    $stmt = $conn->prepare($sqlGetUserInfo);
    $stmt->execute([$sEmail]);

    if ($stmt->rowCount() == 0) {
      echo "user gibt es nciht";
      exit();
    }

    $userRow = $stmt->fetch();

    if ($userRow["pwd"] != $sPwdHash) {
      echo "Password stimmt nicht überein!";
      header('Location: login.php');
      exit();
    }


    //Prüfen ob User schonmal logged in war
    $firstLogin = "SELECT email,first_login FROM user WHERE email=?";
    $firstLoginstmt = $conn->prepare($firstLogin);
    $firstLoginstmt->execute([$sEmail]); //--> Der Fehler ist hier! Ich bekomme nicht den Wert!

    $userRow = $firstLoginstmt->fetch();


    //Wichtig: Erst wenn beim neuen Passwort bestätigt wird, wird first_login auf false gesetzt!



    //Was machen wenn das der Fall ist?
    //Was bei falscher Email?

    // Login Anzahl: Login Variable
    $sqlUpdateActive =  "UPDATE user SET active=?  WHERE email=?";
    $stmt = $conn->prepare($sqlUpdateActive);
    $stmt->execute([$sActive, $sEmail]);




    // Hier alle Daten sammeln
    $sqlGetSessionInfo = "SELECT email, pwd, first_name, last_name, gender FROM user WHERE email=?";
    $t = $conn->prepare($sqlGetSessionInfo);
    $t->execute([$sEmail]);

    // Hier können der Session die Attribute vom Login übergeben werden
    foreach ($t->fetchAll() as $row) {
      $_SESSION['logged_in'] = true;
      $_SESSION['email'] = $row["email"];
      $_SESSION['pwd'] = $row["pwd"];
      $_SESSION['first_name'] = $row["first_name"];
      $_SESSION['last_name'] = $row["last_name"];
      $_SESSION['gender'] = $row["gender"];
      $_SESSION['first_login'] = $row["first_login"];
      // Weitere Daten können hier hinzugefügt werden
    }


    $sqlGetSessionInfo2 = "SELECT date_time FROM login_info WHERE fk_email=? ORDER BY id DESC LIMIT 1";
    $t2 = $conn->prepare($sqlGetSessionInfo2);
    $t2->execute([$sEmail]);

    foreach ($t2->fetchAll() as $row) {
      $_SESSION['date_time'] =  $row['date_time'];
      // Weitere Daten können hier hinzugefügt werden
    }

    // Login-Daten werden ausgegeben
    $sqlUpdateLoginInfo = "INSERT into login_info (os,resolution,date_time,fk_email) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sqlUpdateLoginInfo);
    $stmt->execute([$sOs, $sResolution, $sDatetime, $sEmail]);
    //Close connection
    $conn = null;

    if ($userRow['first_login'] == 1) {
      header('Location: first_login.php');
      exit();
    }

    header("Location: index.php");
  } catch (PDOException $e) {
    $handle = fopen("error_addfriend.txt", "w");
    fwrite($handle, $e->getMessage());
    fclose($handle);
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Webshop</title>

  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

  <link rel="stylesheet" href="../CSS/login_styles.css">

  <link rel="stylesheet" href="../CSS/general_frontend_styles.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Webshop</a>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Homepage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>

          <?php

          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
          ?>

            <li class="nav-item">
              <a id="active" class="nav-link active" href="logout.php">Logout</a>
            </li>
          <?php
          } else {
          ?>

            <li class="nav-item">
              <a id="active" class="nav-link active" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="true">Register</a>
            </li>
          <?php
          }
          ?>


        </ul>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          setInterval(function() {
            $.get("active_logins.php", {
                auswahl: 1 * new Date()
              },
              function(daten) {
                $('#active-users').html(daten);
              });
          }, 1000);
        });
      </script>
      <button class="btn btn-outline-success" style="margin-right: 10px;">
        <div><i class="fas fa-users"></i> Users Online: <div id="active-users" style="display: inline;"></div>
      </button>
      <a href="profile.php" class="btn btn-outline-success left" role="button" aria-pressed="true" style="margin-right: 10px;">
        <i class="fas fa-user"></i>&nbsp Account</a>
      <a href="shopping_cart.php" class="btn btn-outline-success" role="button" aria-pressed="true">
        <i class="fas fa-shopping-cart"></i>&nbsp Shopping Cart</a>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-1">

      </div>
      <div class="col-10">
        <form class="form-horizontal login-form" method="POST" action="#">
          <fieldset>

            <!-- Form Name -->
            <legend class="login-legend">
            <?php 
            if($_SESSION['first_login'] == true) {
              echo "We have send you an email with your first password. <br> You can choose a new one directly after the first login";
              $_SESSION['first_login'] = false;
            } else{
              echo "Login";
            }
            ?>
             </legend>

            <!-- Text input-->
            <div class="form-group">
              <label class=" control-label" for="email-input">Enter your Email:</label>
              <div class="">
                <input id="email-input" required name="email-input" type="email" placeholder="email-address" class="form-control input-md custom-login-input">
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class=" control-label" for="passwordinput">Enter your Password:</label>
              <div class="">
                <input id="password-input" required type="password" placeholder="password" class="form-control input-md custom-login-input">
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class=" control-label" for="login-button"></label>
              <div class="">
                <button id="login-button" name="singlebutton" type="submit" class="btn btn-success custom-login-button">Login</button>
              </div>
            </div>

          </fieldset>
          <div class="additional-login-content">
            <div class="create-account login-text"><a class="register-link" href="register.php">Register Now</a></div>
            <div class="forgot-password login-text"><a class="register-link" href="forgot_password.php">Forgot your Password?</a></div>
          </div>

          <input type="hidden" value="" id="os-input" name="os-input">
          <input type="hidden" value="" id="resolution-input" name="resolution-input">
          <input type="hidden" value="" id="datetime-input" name="datetime-input">
          <input type="hidden" value="" id="hash-input" name="hash-input">

        </form>

      </div>
      <div class="col-1">

      </div>
    </div>
  </div>

  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../JavaScript/sha512.js"></script>
  <script src="../JavaScript/login.js"></script>

</body>

</html>