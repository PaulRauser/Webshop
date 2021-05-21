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


$sqlCheckForEmailDuplicates = "SELECT COUNT(*) AS c FROM user WHERE email=?";
$stmt = $conn->prepare($sqlCheckForEmailDuplicates);
$stmt->execute([$sEmail]);

$rowCount = $stmt->fetch();

if ((int)($rowCount["c"]) != 0) {
    echo "Email gibt es schon";
    $sDuplicate = true;
}
