<?php
session_name("timlshop");
session_start();

// Verhindern, dass man auf die Seite kommt wenn man schonmal eingeloggt war
if ((isset($_POST['new-password-input']))) {
  try {
    // Datenbank settings
    $datenbankname = "timl";
    $benutzername = "tim";
    $benutzerpasswort = "q9Xlx6Hk7Vpl";
    $servername = "chelex.life";

    $sEmail = $_SESSION['email']; 
    $sNewPassword = $_POST["new-password-input"];


    // Verbindung zur Datenbank
    $conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // SQL
    $sNewPasswordHash = hash("sha512", $sNewPassword); 

    // Neues Password
    $sqlUpdatePassword = "UPDATE user SET pwd=?  WHERE email=?";
    $stmt = $conn->prepare($sqlUpdatePassword);
    $stmt->execute([$sNewPasswordHash,$sEmail]);

    //Prüfen ob User schonmal logged in war
    $firstLogin = "SELECT email,first_login FROM user WHERE email=?";
    $stmt = $conn->prepare($firstLogin);
    $stmt->execute([$sEmail]); //--> Der Fehler ist hier! Ich bekomme nicht den Wert!
  
    $userRow = $stmt -> fetch();
    
    if($userRow['first_login'] == 1) {
      $firstLogin = "UPDATE user SET first_login = 0, active = 0  WHERE email=?";
      $stmt = $conn->prepare($firstLogin);
      $stmt->execute([$sEmail]);
      
    }

 
    //Close connection
    $conn = null;

    header("Location: login.php");
  } catch (PDOException $e) {
    echo $e -> getMessage();
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
    <title>Skibble</title>

    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/no_access.css">
    <link rel="stylesheet" href="../CSS/first_login.css">

    <link rel="stylesheet" href="../CSS/general_frontend_styles.css">
</head>
<body>
    <h1>Please change your password for first Login</h1>
    <form method="POST" action="">
        <div class="password-section">
            <input type="password" name="new-password-input" class="first-password"  placeholder="Enter new Password" required>
            <input type="password" name="new-password-repeat" class="first-password" placeholder="Repeat new Password" required>
        </div>
    <button class="submit-button-first-login" type="submit">
        Confirm
    </button>
    <div class="info"></div>

    </form>

    <script src="../JavaScript/first_login.js"></script>
</body>
</html>