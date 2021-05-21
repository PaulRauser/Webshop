<?php 

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
$sqlGetActive =  "SELECT COUNT(*) FROM user WHERE active=1";
$stmt = $conn->query($sqlGetActive);
$count = $stmt->fetchColumn();

echo $count;




?>
