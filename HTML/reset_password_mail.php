<?php
//für Paul
//Start Session
session_name("timlshop");
session_start();

function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$sNewGeneratedPassword = randomPassword();
$sForgotPasswordEmail = $_SESSION['forgot_password_email'];
$sLastName = $_SESSION['last_name'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

$datenbankname = "timl";
$benutzername = "tim";
$benutzerpasswort = "q9Xlx6Hk7Vpl";
$servername = "chelex.life";


// Verbindung zur Datenbank
$conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//First login wieder true
//Password in Datenbank zu $generatedPassword machen
$sqlUpdatePasswordAndFirstLogin = "UPDATE user SET pwd=?, first_login=?  WHERE email=?";
$update = $conn->prepare($sqlUpdatePasswordAndFirstLogin);
$update->execute([hash('sha512',$sNewGeneratedPassword),1,$sForgotPasswordEmail]);

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

    $mail->addAddress($sForgotPasswordEmail, $sLastName);
    //Set subject
    $mail->Subject = "Reset Password - Skibble";

    //Mail Body
    $mail->Body = "Please log in with this password: " . $sNewGeneratedPassword . " After this you'll have to change it.";

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