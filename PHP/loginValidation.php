<?php
    echo $_POST['passwordinput']; 
    echo hash ( "sha256", $_POST['passwordinput'] , false ) ;
?>