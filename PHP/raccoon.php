<?php
session_name("timlshop");
session_start();
//Check if user is logged in
$logged_in = $_SESSION['logged_in'];
if ($logged_in != true) {
  header('Location: no_access.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skibble</title>

    <link rel="stylesheet" href="../CSS/raccoon.css">
    <link rel="stylesheet" href="../CSS/general_frontend_styles.css">
</head>
<body>
    <h1 style="color:white;  font-weight:800; font-size:40px;">Thank you for your order!</h1>
    <a class="return-link" href="index.php">Return to Homepage</a>
</body>
</html>