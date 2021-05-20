<?php
//SQL
try {

    // Datenbank settings
    $datenbankname = "timl";
    $benutzername = "tim";
    $benutzerpasswort = "q9Xlx6Hk7Vpl";
    $servername = "chelex.life";

    if (!(isset($_POST['email-input']) and  isset($_POST['resolution-input']) and isset($_POST['os-input']) and isset($_POST['datetime-input']))) {
        echo "Fehler";
        exit();
    }

    $sEmail = $_POST['email-input'];

    $sResolution = $_POST['resolution-input'];

    $sOs = $_POST['os-input'];

    $sDatetime = $_POST['datetime-input'];


    // Verbindung zur Datenbank
    $conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL
    $sqlUpdateLoginInfo = "INSERT into login_info (os,resolution,date_time,fk_email) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sqlUpdateLoginInfo);
    $stmt->execute([$sOs, $sResolution, $sDatetime, $sEmail]);

    //Close connection
    $conn = null;
} catch (PDOException $e) {
    $handle = fopen("error_addfriend.txt", "w");
    fwrite($handle, $e->getMessage());
    fclose($handle);
}

?>