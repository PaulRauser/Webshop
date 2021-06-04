<?php

session_name("timlshop");
session_start();

// Array[Array[Produktname, Bilderlink(Small), Preis, Amount, description], Summe]
include_once "PHP_Functions/shopping_cart_functions.php";
$personalShoppingCartData = getShoppingCartData($_SESSION["email"] ?? "");

$sLastName = $_SESSION['last_name'];
$sFirstName = $_SESSION['first_name'];
$sEmail = $_SESSION['email'];


// $totalPrice = $_POST['post-total-price']; 
$shippingMethod = $_POST['post-shipping-method']; 

$totalPrice = null;
if($shippingMethod == "DHL") {
    $totalPrice = $personalShoppingCartData["discounted_sum"] + 8.99;
} elseif ($shippingMethod == "DHL-Express") {
    $totalPrice = $personalShoppingCartData["discounted_sum"] + 23.99;
} elseif ($shippingMethod == "FedEx") {
    $totalPrice = $personalShoppingCartData["discounted_sum"] + 3.99;
}

$orderedProducts = "";
$ordered_amount = 0;

foreach($personalShoppingCartData["pData"] as $product) {
    $orderedProducts .= " " . $product["amount"] . "x " .  $product["name"] . ",";
    $ordered_amount = $ordered_amount + 1; 
}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

$datenbankname = "timl";
$benutzername = "tim";
$benutzerpasswort = "q9Xlx6Hk7Vpl";
$servername = "chelex.life";

$mail = new PHPMailer(TRUE);

//Use SMTP
$mail->isSMTP();

$mail->Host = "smtp.gmail.com";

$mail->Port = 587;

$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

//Username
$mail->Username = "skibble987@gmail.com";

//Passwort --> Account Password: abcde54321! --> Das drunter ist ein App Passwort.
//App Password for access from other application
$mail->Password = "aiajdpnceltqnbcq";


$sName = $sFirstName.' '.$sLastName; 
// Open try Catch
try {
    //Set mail sender
    $mail->setFrom('skibble987@gmail.com', 'Skibble');

    //Set recipient

    $mail->addAddress($sEmail, $sName);
    //Set subject
    $mail->Subject = "Order confirmation - Skibble";

    
    //Mail Body
    $mail->Body = "<div>" . htmlentities(" Thank you for your order. You ordered " . $ordered_amount . " different products: " . $orderedProducts . " with " . $shippingMethod . " for a total of " . $totalPrice . "€") . "</div>"; //Number of product/name of product, number of product... with Versandoption for Gesamtsumme (reduziert)";
    
    $mail->isHTML(true);
    
    $mail->send();
}

catch(Exception $e) {
    //PHP Mailer Exception
    echo $e->errorMessage();
}

catch(\Exception $e) {
    //PHP Exception (Backslash to select the global namespace Exception class)
    echo $e->getMessage();
}


$userId = getIdFromUserByEmail($sEmail);


// add delivery address to database
$address = $_POST["address"];
$country = $_POST["country"];
$city = $_POST["city"];
$zip = $_POST["zip"];

completeOrder($userId, $totalPrice, $shippingMethod, $zip, $address, $country, $city);


foreach($personalShoppingCartData["pData"] as $product) {
    addItemToOrder(getRecentOrderIdFromUser($userId), $product["product_id"], $product["amount"], $product["discounted_price"]);
}

deleteFromShoppingCart($sEmail);

include_once "PHP_Functions/product_functions.php";













// Mail versenden und dann an Login weitergeben
header("Location: raccoon.php");
?>