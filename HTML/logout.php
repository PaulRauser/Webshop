<?php
session_name("timlshop");
session_start();
  //Check if user is logged in
  $logged_in = $_SESSION['logged_in'];
  if($logged_in != true) {
    header('Location: no_access.php');
  }
?>

<?php

session_name("timlshop");
session_start();

unset($_SESSION);
session_destroy();

header("Location: login.php");

?>