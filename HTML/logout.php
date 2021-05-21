<?php
// session_name("timlshop");
// session_start();
//   //Check if user is logged in
//   $logged_in = $_SESSION['logged_in'];
//   if($logged_in != true) {
//     header('Location: no_access.php');
//   }
?>

<?php

session_name("timlshop");
session_start();

$sEmail = $_SESSION['email'];

// Datenbank settings
$datenbankname = "timl";
$benutzername = "tim";
$benutzerpasswort = "q9Xlx6Hk7Vpl";
$servername = "chelex.life";


// Verbindung zur Datenbank
$conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Login Anzahl: Login 0
$sqlUpdateActive =  "UPDATE user SET active=?  WHERE email=?";
$stmt = $conn->prepare($sqlUpdateActive);
$stmt->execute([0, $sEmail]);


unset($_SESSION);
session_destroy();

header("Location: login.php");

?>