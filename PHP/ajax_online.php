<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery aktualisieren / Aufgabe 3</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/homepage.css">
    <link rel="stylesheet" href="../CSS/general_frontend_styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <h1>Herzlich willkommen!</h1>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $.get("active_logins.php", {
                        auswahl: 1 * new Date()
                    },
                    function(daten) {
                        $('#active-users').html(daten);
                    });
            }, 1000);
        });
    </script>
    <button class="btn btn-outline-success" style="margin-right: 10px;"><div><i class="fas fa-users"></i> Users Online: <div id="active-users" style="display: inline;"></div></button>
    
  

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
</body>

</html>