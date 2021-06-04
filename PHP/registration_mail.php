<?php
//für paul
//Start Session
session_name("timlshop");
session_start();

// include('register.php');
// echo $generatedPassword;
$generatedPassword = $_SESSION['generatedPassword'];
$testAusgabe = $_SESSION['email'];
$sLastName = $_SESSION['last_name'];
$sFirstName = $_SESSION['first_name'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

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
    $sEmail = $_SESSION['email']; 

    $mail->addAddress($sEmail, $name);

    //Set subject
    $mail->Subject = "Your Password - Skibble";

    //Mail Body
    $mail->Body = "Welcome to Skibble. Hereby we confirm your registration. Use the following password for your first Login ".$generatedPassword." After this you'll have to change the password";

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