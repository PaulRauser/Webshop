<?php
session_name("timlshop");
session_start();
//Check if user is logged in
$logged_in = $_SESSION['logged_in'];
if ($logged_in != true) {
  header('Location: no_access.php');
}

?>
<?php

// Array[Array[Produktname, Bilderlink(Small), Preis, Amount, description], Summe]
include_once "PHP_Functions/product_functions.php";
include_once "PHP_Functions/shopping_cart_functions.php";

$personalShoppingCartData = getShoppingCartData($_SESSION["email"] ?? "");



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
    $stmt->execute([$sNewPasswordHash, $sEmail]);




    //Close connection
    $conn = null;

    //header("Location: index.php");
  } catch (PDOException $e) {
    $handle = fopen("error_addfriend.txt", "w");
    fwrite($handle, $e->getMessage());
    fclose($handle);
  }
}


//array[order.id, array[name, condition, header, recent_amount, discounted_price], discounted_sum, date]
// echo var_dump($personalOrderData);
// exit;

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
  <link rel="stylesheet" href="../CSS/shopping_cart.css">
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
      <button class="btn btn-outline-success" style="margin-right: 10px;">
        <div><i class="fas fa-users"></i> Users Online: <div id="active-users" style="display: inline;"></div>
      </button>
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

            <div class="input-description" id="g">Repeat new Password:</div>
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


    <div class="container">
      <h1 class="shopping-cart-heading">Your Previous Orders</h1>

      <!-- // Über gesamte Bestellungen iterieren -->
      <?php
      // PHP um die Recent products zu laden
      include_once "PHP_Functions/recent_products_functions.php";
      $email = $_SESSION["email"];
      $userId = getIdFromUserByEmail($email);
      
      $orderedProducts = "";

      $personalNumberOfOrders = getOrdersByUserId($userId);


      // wir können nicht über die orders (wir haben z.B. ["id"] probiert) iterieren...
      foreach ($personalNumberOfOrders as $order) { ?>
        <div>Ihre Bestellung am: <?php echo $order["date"]; ?>

          <?php
          $_SESSION["total_price"] = $order["total_price"];

          ?>

        </div>

        <!-- Hier nochmal über alle einzelnen Bestellungen iterieren -->




        <?php
        $order_id = $order["id"];
        $personalOrderData = getAllOrderDataByUserId($order_id);
        foreach ($personalOrderData as $product) {  ?>

          <div class="container-fluid col-12 shopping-cart-pos">
            <hr>
            <div class="col-3 shopping-cart-pos-img-box" id="productImage" name="productImage">
              <img class="img-thumbnail shopping-cart-pos-img" src="../images/<?php echo $product["image_cover"]; ?>" alt="Tolles Produkt" />
            </div>
            <div class="col-8" id="productText" name="productDescription">
              <div class="card shopping-cart-pos-description">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $product["name"]; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted">Condition: <?php echo $product["conds"]; ?></h6>
                  <p class="card-text"><?php echo $product["header"]; ?></p>

                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <div class="input-group mb-3">
                        <!-- // TODO also hier muss man noch den amount aufgeben, aus dem value, schwierig, weil php ja zuvor ausgeführt wird -->
                        <form action="shopping_cart.php" method="post">
                          <div class="amount-bought">Recently bought: <?php echo $product["amount"]; ?></div>
                        </form>

                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <?php
          $orderedProducts .= " " . $product["amount"] . "x " .  $product["name"] . ",";
          ?>
        <?php } ?>

    </div>

    <form action="order_again_mail.php" method="POST">
      <button class="buy-again" type="submit">Buy again</button>
    </form>
  <?php } ?>



  <!-- Hier muss mit click auf buy again  -->
  <div class="container">
    <div class="row justify-content-end final-price">
      <div class="col-2 shopping-cart-sum profile-price">
        <p id="discountedPrice" class="discounted-price price" name="discountedPrice">Discounted Sum: <?php echo $order["total_price"]; ?> €</p>
      </div>
    </div>
  </div>

<?php 
$_SESSION["ordered-products"] = $orderedProducts

?>



  <div class="copyright">©Dolly-Dawn Barnpusher 2021</div>

  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../JavaScript/change_password.js"></script>
</body>

</html>