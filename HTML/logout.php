<?php

session_name("timlshop");
session_start();

unset($_SESSION);
session_destroy();

header("Location: login.php");
?>