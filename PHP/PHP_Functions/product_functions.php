<?php

function getProductData($id, $specificData) {
    $conn = openDatabase();
    
    $sqlGetProductData = "SELECT $specificData FROM products WHERE id=?";
    $stmt = $conn->prepare($sqlGetProductData);
    $stmt->execute([$id]);

    if($specificData == 'name') {
        foreach ($stmt->fetchAll() as $row) {
            $b['name'] =  $row['name'];
            echo $b['name'];
        }
    }
    elseif($specificData == 'price') {
        foreach ($stmt->fetchAll() as $row) {
            $b['price'] =  $row['price'];
            echo $b['price'];
        }
    }
    elseif($specificData == 'image_cover') {
        foreach ($stmt->fetchAll() as $row) {
            $b['image_cover'] =  $row['image_cover'];
            echo $b['image_cover'];
        }
    }
    
    closeDatabase($conn);
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
        return $conn;
    }

    catch (PDOException $e) {
        $handle = fopen("error_addfriend.txt", "w");
        fwrite($handle, $e->getMessage());
        fclose($handle);
    }
}

function closeDatabase($closeArgument) {
    $closeArgument = null;
}


?>