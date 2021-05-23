<?php

function getProductData($id, $specificData) {
    
}

function openDatabase() {
    try {
        // Datenbank settings
        $datenbankname = "timl";
        $benutzername = "tim";
        $benutzerpasswort = "q9Xlx6Hk7Vpl";
        $servername = "chelex.life";
    
        // Verbindung zur Datenbank
        $conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);
    
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch (PDOException $e) {
        $handle = fopen("error_addfriend.txt", "w");
        fwrite($handle, $e->getMessage());
        fclose($handle);
    }
}

function closeDatabase() {
    $conn = null;
}


?>