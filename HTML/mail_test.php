<?php
    $empfaenger_mail = "p.rauser@outlook.com";
    $betreff = "Neue Mail";
    $nachricht = "Das hier ist eine Test Mail";
    $from = "From: Absender p.rauser@outlook.com";

    mail($empfaenger_mail, $betreff, $nachricht, $from);


?>