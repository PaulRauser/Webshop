<?php

function getProductData($id, $specificData, $conn) {
    
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
    
}

function addToShoppingCartLogic($amount, $email, $product_number) {
    $conn = openDatabase();

    $product_amount = null;

    $sqlGetProductFromEmail = "SELECT amount FROM shopping_cart WHERE email_fk=? AND product_id_fk=?";
    $t2 = $conn->prepare($sqlGetProductFromEmail);
    $t2->execute([$email, $product_number]);

    foreach ($t2->fetchAll() as $row) {
      $product_amount =  $row['amount'];
    }

    if($product_amount == null) {
        addToShoppingCart($conn, $amount, $email, $product_number);
    }
    
    else {
        $newProductAmount = $product_amount + $amount;
        updateShoppingCart($conn, $newProductAmount, $email, $product_number);    
    }

    closeDatabase($conn);
}

function addToShoppingCart($connection, $amount, $email, $product_number) {
    $sqlAddToShoppingCart = "INSERT into shopping_cart (amount, email_fk, product_id_fk) VALUES (?,?,?)";
    $stmt = $connection->prepare($sqlAddToShoppingCart);
    $stmt->execute([$amount, $email, $product_number]);
}

function updateShoppingCart($connection, $amount, $email_fk, $product_id_fk) {
    $sqlUpdateShoppingCartAmount = "UPDATE shopping_cart SET amount=? WHERE email_fk=? AND product_id_fk=?";
    $stmt = $connection->prepare($sqlUpdateShoppingCartAmount);
    $stmt->execute([$amount, $email_fk, $product_id_fk]);
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