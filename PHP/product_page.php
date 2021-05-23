<?php
include 'PHP_Functions/product_functions.php';
session_name("timlshop");
session_start();
  //Check if user is logged in
  // $logged_in = $_SESSION['logged_in'];
  // if($logged_in == true) {
  //   header('Location: index.php');
  // }

$product_number = 12;
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

    <link rel="stylesheet" href="../CSS/product_page.css">
    <link rel="stylesheet" href="../CSS/general_frontend_styles.css">
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
                <a class="nav-link" aria-current="page" href="index.php">Homepage</a>
              </li>
              <li class="nav-item">
                <a id="active" class="nav-link" href="products.php">Products</a>
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
            <button class="btn btn-outline-success" style="margin-right: 10px;"><div><i class="fas fa-users"></i> Users Online: <div id="active-users" style="display: inline;"></div></button>
            <a href="profile.php" class="btn btn-outline-success left" role="button" aria-pressed="true" style="margin-right: 10px;">
              <i class="fas fa-user"></i>&nbsp Account</a>         
            <a href="shopping_cart.php" class="btn btn-outline-success" role="button" aria-pressed="true">
              <i class="fas fa-shopping-cart"></i>&nbsp Shopping Cart</a>
        </div>
      </nav>
      <div class="container">
        <div class="row">
            <div class="col-7">
              <div class="product-image-section ">
                <div id="carouselExampleIndicators" class="carousel slide product-carousel" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item product-carousel-item active">
                      <img src="../images/<?php getProductData($product_number, 'image_slide_1'); ?>" class="d-block w-100 product-page-image" alt="">
                    </div>
                    <div class="carousel-item product-carousel-item">
                      <img src="../images/<?php getProductData($product_number, 'image_slide_2'); ?>" class="d-block w-100 product-page-image" alt="">
                    </div>
                    <div class="carousel-item product-carousel-item">
                      <img src="../images/<?php getProductData($product_number, 'image_slide_3'); ?>" class="d-block w-100 product-page-image" alt="">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="col-5">
                <div class="product-section-content">
                    <h3 class="product-section-header"><?php getProductData($product_number, 'name');?></h3>
                    <div class="product-page-price"><?php getProductData($product_number, 'price');?>€</div>
                    <div class="product-description-heading">
                      <?php getProductData($product_number, 'header');?> 
                    </div>
                    <div class="product-description-text condition">Condition: <?php getProductData($product_number, 'conds');?></div>
                    <div class="product-description-text">
                    <?php getProductData($product_number, 'description');?>
                    </div>
                    <form class="product-quantity" action="#">
                        <span class="quantity-text">Quantity:</span>
                        <div class="form-outline number-input">
                            <input type="number" id="typeNumber" class="form-control shadow-none" value="1" min="1" max="100" 
                              onkeydown="if(event.key==='.' | event.key===','){event.preventDefault();}"
                              oninput="if (this.value.length > 2) {this.value = this.value.slice(0,2);}"/>
                          </div>
                        <button type="submit" class="product-submit-button">Add to cart</button>
                    </form>
                </div>
            </div>
          </div>
      </div>


      <script src="../node_modules/jquery/dist/jquery.js"></script>
      <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
      <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
      <script src="../JavaScript/product_page.js"></script>
</body>
</html>