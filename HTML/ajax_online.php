<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery aktualisieren / Aufgabe 3</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">

            $(document).ready(function()
            {
                setInterval(function()
                {
                    $.get("active_logins.php",
                    { auswahl:1*new Date()},
                    function(daten)
                    {
                        $('#ausgabe').html(daten);
                    });
                },1000);
            });
    </script>
</head>
<body>
    <h1>Herzlich willkommen!</h1>
    <div id="ausgabe"></div>
</body>
</html>