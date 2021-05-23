<?php
include_once 'product_functions.php';


function getShoppingCartData($email)
{
    // Array[Array[Produktname, Bilderlink(Small), Preis, Amount, description], Summe]
    $conn = openDatabase();
    $shoppingCartData = array();



    $sqlGetAllShoppingCartInfos = "SELECT amount, name, REPLACE(FORMAT(ROUND(price * amount,2),2),',','') as regular_price, REPLACE(FORMAT(ROUND(price * amount * (1- IF(amount>=10,0.15,0)),2),2),',','') as discounted_price, header, image_cover, conds, products.id as product_id FROM shopping_cart INNER JOIN user ON (user.email=email_fk) INNER JOIN products ON (products.id=product_id_fk) WHERE user.email=?";
    $stmt = $conn->prepare($sqlGetAllShoppingCartInfos);
    $stmt->execute([$email]);

    $shoppingCartData["pData"] = $stmt->fetchAll();


    $shoppingCartData["regular_sum"] = 0.0;
    $shoppingCartData["discounted_sum"] = 0.0;

    foreach ($shoppingCartData["pData"] as $product) {
        $shoppingCartData["regular_sum"] += (float)$product["regular_price"];
        $shoppingCartData["discounted_sum"] += (float)$product["discounted_price"];
    }

    return $shoppingCartData;
}

function getRecentOrderIdFromUser($userId) {
    $conn = openDatabase();

    $getRecentOrderIdFromUser = "SELECT id FROM orders WHERE fk_user=? ORDER BY date DESC LIMIT 1";
    $stmt = $conn->prepare($getRecentOrderIdFromUser);
    $stmt->execute([$userId]);

    return $stmt->fetch()[0];
    closeDatabase($conn);
}


function completeOrder($userId, $total_price, $shipping_method)
{
    $conn = openDatabase();

    $sqlInsertOrder = "INSERT INTO orders (fk_user, total_price, shipping_method) VALUES (?,?,?)";
    $stmt = $conn->prepare($sqlInsertOrder);
    $stmt->execute([$userId, $total_price, $shipping_method]);

    

    
    closeDatabase($conn);
}

function addItemToOrder($order_id, $product_id, $amount, $price) {
    $conn = openDatabase();

    $sqlAddItemToOrder = "INSERT INTO orders_products (order_id, product_id, amount, price) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sqlAddItemToOrder);
    $stmt->execute([$order_id, $product_id, $amount, $price]);

    closeDatabase($conn);
}


function deleteFromShoppingCart($email) {
    $conn = openDatabase();

    $sqlclearShoppingCart = "DELETE FROM shopping_cart WHERE email_fk=?";
    $stmt = $conn->prepare($sqlclearShoppingCart);
    $stmt->execute([$email]);

    closeDatabase($conn);
}



function removeFromShoppingCartByUserIdAndProductId($email, $productId)
{
    $conn = openDatabase();

    $sqlclearShoppingCart = "DELETE FROM shopping_cart WHERE email_fk=? and product_id_fk=?";
    $stmt = $conn->prepare($sqlclearShoppingCart);
    $stmt->execute([$email, $productId]);

    closeDatabase($conn);
}

function getIdFromUserByEmail($email)
{
    $UserId = null;
    $conn = openDatabase();

    //Existiert der User?
    $sqlgetIdFromUserByEmail = "SELECT COUNT(*) FROM user WHERE email=?";
    $stmt = $conn->prepare($sqlgetIdFromUserByEmail);
    $stmt->execute([$email]);

    $var = $stmt->fetch()[0];

    if ((int)$var == 1) {
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
