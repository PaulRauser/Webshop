<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skibble</title>

    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/no_access.css">
    <link rel="stylesheet" href="../CSS/first_login.css">

    <link rel="stylesheet" href="../CSS/general_frontend_styles.css">
</head>
<body>
    <h1>Please change your password for first Login</h1>
    <form action="">
        <div class="password-section">
            <input type="password" class="first-password"  placeholder="Enter new Password" required>
            <input type="password" class="first-password" placeholder="Repeat new Password" required>
        </div>
    <button class="submit-button-first-login" type="button">
        Confirm
    </button>
    <div class="info"></div>

    </form>

    <script src="../JavaScript/first_login.js"></script>
</body>
</html>