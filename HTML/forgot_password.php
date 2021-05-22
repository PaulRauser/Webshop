<?php
session_name("timlshop");
session_start();
  
  if(isset($_POST['usermail'])){
    try{
    $datenbankname = "timl";
    $benutzername = "tim";
    $benutzerpasswort = "q9Xlx6Hk7Vpl";
    $servername = "chelex.life";

   
    $sCheckedMail = $_POST["usermail"];


    // Verbindung zur Datenbank
    $conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlDoesUserExist = "SELECT 1 from user WHERE email=?";
    $stmt = $conn->prepare($sqlDoesUserExist);
    $stmt->execute([$sCheckedMail]);
    
    $res = $stmt ->fetch();

    echo $res;
    }
  }
?>

<?php
  //Hier die Mail die ins Formular eingegeben wird Speichern und an reset_password_mail übergeben!
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skibble</title>

    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/login_styles.css">
    <link rel="stylesheet" href="../CSS/forgot_password_styles.css">

    <link rel="stylesheet" href="../CSS/general_frontend_styles.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Skibble</a>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Homepage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a id="active" class="nav-link active" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="true">Register</a>
          </li>
        </ul>
      </div>
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
      <a href="#" class="btn btn-outline-success left" role="button" aria-pressed="true" style="margin-right: 10px;">
        <i class="fas fa-user"></i>&nbsp Account</a>         
      <a href="shopping_cart.php" class="btn btn-outline-success" role="button" aria-pressed="true">
        <i class="fas fa-shopping-cart"></i>&nbsp Shopping Cart</a>
    </div>
  </nav>
    <div class="container">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">
            <form class="form-horizontal login-form" action="" method="POST">
                <fieldset>
                
                <!-- Form Name -->
                <legend class="login-legend">Forgot your password?</legend>
                <p>Enter the email address you used to register here, and we'll send you instructions to reset your password.</p>
                <!-- Text input-->
                <div class="form-group">
                  <label class=" control-label" for="textinput">Enter your Username:</label>  
                  <div class="">
                  <input id="usermail" name="usermail" type="text" placeholder="email-address" class="form-control input-md custom-login-input">
                    
                  </div>
                </div>
                             
                <!-- Button -->
                <div class="form-group">
                  <label class=" control-label" for="singlebutton"></label>
                  <div class="">
                    <button id="singlebutton" name="singlebutton" class="btn btn-success custom-login-button">Send Instructions</button>
                  </div>
                </div>
                
                </fieldset>
                <div class="additional-login-content">
                  <button class="btn btn-link login-text register-link"  style="text-decoration: none; color: #007E33; box-shadow: none;" type="button" data-bs-toggle="collapse" data-bs-target="#info">
                    <p id="collapse-text">I don´t remember my email address</p>
                  </button>
                  <!-- Collapse Info - Don´t remember my email address -->
                  <div class="collapse" id="info"> 
                    <div class="card card-body blub">
                      Please create a new account or contact support!
                    </div>
                  </div>

                  <div><a class="link-success login-text register-link" href="login.php">Back to login</a></div>
                </form>
              </div>
            <div class="col-1">

            </div>
        </div>
      </div>

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
    <script src="../JavaScript/login.js"></script>
</body>
</html>