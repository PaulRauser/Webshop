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

if ((isset($_POST['new-password-input']))) {
  try {
    // Datenbank settings
    $datenbankname = "timl";
    $benutzername = "tim";
    $benutzerpasswort = "q9Xlx6Hk7Vpl";
    $servername = "chelex.life";

    $sNewPassword = $_POST['new-password-input'];

    $sEmail = $_SESSION['email'];

    // Verbindung zur Datenbank
    $conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL
    $sNewPasswordHash = hash("sha512", $sNewPassword); 

    // Login-Daten werden ausgegeben
    $sqlUpdatePassword = "UPDATE user SET pwd=?  WHERE email=?";
    $stmt = $conn->prepare($sqlUpdatePassword);
    $stmt->execute([$sNewPasswordHash,$sEmail]);




    //Close connection
    $conn = null;

    //header("Location: index.php");
  } catch (PDOException $e) {
    $handle = fopen("error_addfriend.txt", "w");
    fwrite($handle, $e->getMessage());
    fclose($handle);
  }
}

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

    <link rel="stylesheet" href="../CSS/profile.css">
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
                <a class="nav-link active" aria-current="page" href="index.php">Homepage</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <?php

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                ?>

                <li class="nav-item">
                    <a class="nav-link active" href="logout.php">Logout</a>
                </li>
                <?php
            } else {
                ?>

                <li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="true">Register</a>
                </li>
                <?php
            }
            ?>
            </ul>
          </div> 
          <a href="profile.php" class="btn btn-success left" role="button" aria-pressed="true" style="margin-right: 10px;">
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
            <div class="change-password-section">
              <h3 class="change-password-heading">Change your Password</h3>
              <form class="change-password-form" action="" method="POST">
                <!-- <div class="input-description" id="g">Enter old Password:</div>
                <div class="input-group flex-nowrap change-password">
                    <input type="password" class="form-control input-md old-password" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="old-password-info pw-info"></div> -->

                <div class="input-description" id="g">Enter new Password:</div>
                <div class="input-group flex-nowrap change-password">
                <input name="new-password-input" id="new-password-input" type="password" class="form-control new-password" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="new-password-info pw-info"></div>

                <div  class="input-description" id="g">Repeat new Password:</div>
                <div class="input-group flex-nowrap change-password">
                  <input id="" type="password" class="form-control repeat-password" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="repeat-password-info pw-info"></div>

                <button type="submit" class="btn btn-success forgot-password-button">Submit</button>
              </form>
            </div>
            
          </div>
          <div class="col-1">
            
          </div>
        </div>
        <div class="buy-again-header">
          Order recent products again
        </div>
        <div class="row profile-row">
          <div class="buy-again-heading"></div>
          <div class="col-12 buy-again-container">
            <div class="row"></div>
            <div class="buy-again-item">
              <div class="buy-again-image-box">
                <img class="buy-again-image" src="../images/GTR.jpg" alt="GTR">
              </div>
              <div class="buy-again-text-box">
                <div class="buy-again-title">Fuggin Holy GTR</div>
                <div class="buy-again-text">Who doesn't want to own a GTR? (Non Nissan Edition)</div>
                <div class="buy-again-text additional-info-buy-again">To order a different amount you need to place a new order.</div>
                <div class="buy-again-amount">Amount: 7</div>
                <div class="buy-again-button">Buy again</div>
              </div>
            </div>
            <div class="buy-again-item">
              <div class="buy-again-image-box">
                <img class="buy-again-image" src="../images/GTR.jpg" alt="GTR">
              </div>
              <div class="buy-again-text-box">
                <div class="buy-again-title">GODZILLA</div>
                <div class="buy-again-text">Who doesn't want to own a GTR? (Non Nissan Edition)</div>
                <div class="buy-again-text additional-info-buy-again">To order a different amount you need to place a new order.</div>
                <div class="buy-again-amount">Amount: 7</div>
                <div class="buy-again-button">Buy again</div>
              </div>
            </div>
            <div class="buy-again-item">
              <div class="buy-again-image-box">
                <img class="buy-again-image" src="../images/GTR.jpg" alt="GTR">
              </div>
              <div class="buy-again-text-box">
                <div class="buy-again-title">Fuggin GTR 3</div>
                <div class="buy-again-text">Who doesn't want to own a GTR? (Non Nissan Edition)</div>
                <div class="buy-again-text additional-info-buy-again">To order a different amount you need to place a new order.</div>
                <div class="buy-again-amount">Amount: 7</div>
                <div class="buy-again-button">Buy again</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="copyright">©Dolly-Dawn Barnpusher 2021</div>

      <script src="../node_modules/jquery/dist/jquery.js"></script>
      <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
      <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
      <script src="../JavaScript/change_password.js"></script>
</body>
</html>