<?php
include_once 'product_functions.php';


function getShoppingCartData($email) {
    // Array[Array[Produktname, Bilderlink(Small), Preis, Amount, description], Summe]
    $conn = openDatabase();
    $shoppingCartData = array();


    $sqlGetAllShoppingCartInfos = "SELECT amount, name, round(price * amount,2) as price, description, image_cover, conds FROM shopping_cart INNER JOIN user ON (user.email=email_fk) INNER JOIN products ON (products.id=product_id_fk) WHERE user.email=?";
    $stmt = $conn->prepare($sqlGetAllShoppingCartInfos);
    $stmt->execute([$email]);

    $shoppingCartData["pData"] = $stmt->fetchAll();


    $shoppingCartData["sum"] = 0.0;
    foreach($shoppingCartData["pData"] as $product) {
        $shoppingCartData["sum"] += (float)$product["price"];
    }
    
    return $shoppingCartData;
    


}


function getIdFromUserByEmail($email) {
    $UserId = null;
    $conn = openDatabase();

    //Existiert der User?
    $sqlgetIdFromUserByEmail = "SELECT COUNT(*) FROM user WHERE email=?";
    $stmt = $conn->prepare($sqlgetIdFromUserByEmail);
    $stmt->execute([$email]);

    $var = $stmt->fetch()[0];

    if((int)$var == 1) {
        $sqlgetIdFromUserByEmail = "SELECT id FROM user WHERE email=?";
        $stmt2 = $conn->prepare($sqlgetIdFromUserByEmail);
        $stmt2->execute([$email]);
        $UserId =  $stmt2->fetch()[0];
    } else {
        $UserId = -1;
    }

    closeDatabase($conn);
    return $UserId;
}