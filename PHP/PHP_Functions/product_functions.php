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
    elseif($specificData == 'image_slide_1') {
        foreach ($stmt->fetchAll() as $row) {
            $b['image_slide_1'] =  $row['image_slide_1'];
            echo $b['image_slide_1'];
        }
    }
    elseif($specificData == 'image_slide_2') {
        foreach ($stmt->fetchAll() as $row) {
            $b['image_slide_2'] =  $row['image_slide_2'];
            echo $b['image_slide_2'];
        }
    }
    elseif($specificData == 'image_slide_3') {
        foreach ($stmt->fetchAll() as $row) {
            $b['image_slide_3'] =  $row['image_slide_3'];
            echo $b['image_slide_3'];
        }
    }
    elseif($specificData == 'description') {
        foreach ($stmt->fetchAll() as $row) {
            $b['description'] =  $row['description'];
            echo $b['description'];
        }
    }
    elseif($specificData == 'conds') {
        foreach ($stmt->fetchAll() as $row) {
            $b['conds'] =  $row['conds'];
            echo $b['conds'];
        }
    }
    elseif($specificData == 'header') {
        foreach ($stmt->fetchAll() as $row) {
            $b['header'] =  $row['header'];
            echo $b['header'];
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