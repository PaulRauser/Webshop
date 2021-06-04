<?php
session_name("timlshop");
session_start();
//Check if user is logged in
$logged_in = $_SESSION['logged_in'];
if ($logged_in != true) {
  header('Location: no_access.php');
}

// Array[Array[Produktname, Bilderlink(Small), Preis, Amount, description], Summe]
include_once "PHP_Functions/product_functions.php";
include_once "PHP_Functions/shopping_cart_functions.php";


if ((isset($_POST["updated_amount"]) or isset($_POST["product_delete"])) and isset($_POST["product_id"])) {
  
  $amount = $_POST["updated_amount"];
  $email = $_SESSION["email"];
  $pId = $_POST["product_id"];

  if(json_decode($_POST['product_delete'])) {
    $amount = 0;
  }

  $conn = openDatabase();
  


  updateShoppingCart($conn, $amount, $email, $pId);

  closeDatabase($conn);
}

$personalShoppingCartData = getShoppingCartData($_SESSION["email"] ?? "");




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Webshop</title>

  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

  <link rel="stylesheet" href="../CSS/general_frontend_styles.css">
  <link rel="stylesheet" href="../CSS/shopping_cart.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Webshop</a>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a id="##active##" class="nav-link" aria-current="page" href="index.php">Homepage</a>
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
      <a href="profile.php" class="btn btn-outline-success left" role="button" aria-pressed="true" style="margin-right: 10px;">
        <i class="fas fa-user"></i>&nbsp Account</a>
      <a href="shopping_cart.php" class="btn btn-outline-success" role="button" aria-pressed="true">
        <i class="fas fa-shopping-cart"></i>&nbsp Shopping Cart</a>
    </div>
  </nav>

  <div class="container">
    <h1 class="shopping-cart-heading">Your Shopping Cart</h1>

    <div class="row">
      <div class="col-12 legend" id="priceLegend">Preis</div>

      <!-- Ein Produkt -->
      <?php
      if(sizeof($personalShoppingCartData["pData"]) == 0){
        echo "<div class='alert alert-warning proceed-to-checkout' role='alert'>Your Cart is empty go to <a href='products.php' class='link-danger'>Products </a>instead</div>";
      }
      foreach ($personalShoppingCartData["pData"] as $product) { ?>

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
                        <input type="number" class="form-control" name="updated_amount" id="updated_amount" style="width: 80px; float: left;" placeholder="3" aria-label="amount" aria-describedby="updateAmount" value="<?php echo $product["amount"]; ?>" min="0" max="100" onkeydown="if(event.key==='.' | event.key===',' | event.key==='-' | event.key==='+'){event.preventDefault();}" oninput="if (this.value.length > 2) {this.value = this.value.slice(0,2);}">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $product["product_id"]; ?>">
                        <input type="hidden" name="product_delete" id="product_delete" value="false">
                        <button class="btn btn-outline-success" type="submit" id="updateAmount" name="updateAmount">Update Amount</button>
                        <button class="btn btn-outline-success" type="submit" onclick="$('#product_delete').val('true')">Remove</button>
                      </form>

                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="prices">
            <div class="col-1 shopping-cart-pos-price" id="productPrice" name="productPrice"><?php echo $product["regular_price"]; ?>€</div>
            <div class="discounted-price col-1 shopping-cart-pos-price" id="productPrice" name="productPrice"><?php echo $product["discounted_price"]; ?>€</div>
          </div>
          <hr>
        </div>

      <?php } ?>
    </div>

    </div>
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-2 shopping-cart-sum" id="shoppingCartSum">
          <p id="totalPrice" name="totalPrice">Sum: <?php echo $personalShoppingCartData["regular_sum"]; ?> €</p>
          <p id="totalPrice" class="discounted-price" name="totalPrice">Discounted Sum: <?php echo $personalShoppingCartData["discounted_sum"]; ?> €</p>
        </div>
      </div>
    </div>
    
    <div class="proceed-to-checkout" id="checkoutButton">
              <a href="payment.php" class="btn btn-warning" role="button" aria-pressed="true">
              <i class="far fa-credit-card"></i>&nbsp Proceed to Checkout</a>
    </div>
      

    <?php
      if(sizeof($personalShoppingCartData["pData"]) == 0){ 
        echo "<script type='text/javascript'>
                document.getElementById('checkoutButton').hidden = true;
                document.getElementById('shoppingCartSum').hidden = true;
                document.getElementById('priceLegend').hidden = true;
              </script>";
        $_SESSION['emptyCart'] = true;
      } 
      else{
        $_SESSION['emptyCart'] = false;
      }
    ?>
  </div>
      

  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>