<?php

// Array[Array[Produktname, Bilderlink(Small), Preis, Amount, description], Summe]
include_once "PHP_Functions/shopping_cart_functions.php";
$personalShoppingCartData = getShoppingCartData($_SESSION["email"] ?? "");

session_name("timlshop");
session_start();

$sLastName = $_SESSION['last_name'];
$sEmail = $_SESSION['email'];


foreach()


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

// Open try Catch
try {
    //Set mail sender
    $mail->setFrom('skibble987@gmail.com', 'Skibble');

    //Set recipient

    $mail->addAddress($sEmail, $sLastName);
    //Set subject
    $mail->Subject = "Order confirmation - Skibble";

    //Mail Body
    $mail->Body = "Thank you for your order. You ordered:".   Number of product/name of product, number of product... with Versandoption for Gesamtsumme (reduziert)";

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

// Mail versenden und dann an Login weitergeben
header("Location: login.php");
?>