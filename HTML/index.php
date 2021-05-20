<?php
session_name("timlshop");
session_start();
  //Check if user is logged in
  $logged_in = $_SESSION['logged_in'];
  if($logged_in != true) {
    header('Location: no_access.php');
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

    <link rel="stylesheet" href="../CSS/homepage.css">
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
                <a id="active" class="nav-link active" aria-current="page" href="index.php">Homepage</a>
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
          <a href="profile.php" class="btn btn-outline-success left" role="button" aria-pressed="true" style="margin-right: 10px;">
            <i class="fas fa-user"></i>&nbsp Account</a>         
          <a href="shopping_cart.php" class="btn btn-outline-success" role="button" aria-pressed="true">
            <i class="fas fa-shopping-cart"></i>&nbsp Shopping Cart</a>
        </div>      
      </nav>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../images/Wald.jpg" class="d-block w-100" alt="Wald">
          </div>
          <div class="carousel-caption d-none d-md-block">
            <h5><a href="">Check this out</a></h5>
          </div>
          <div class="carousel-item">
            <img src="../images/Wand.jpg" class="d-block w-100" alt="Wand">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/Bäume.jpg" class="d-block w-100" alt="Bäume">
            <div class="carousel-caption d-none d-md-block">
            </div>
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
      <div class="container">
        <div class="row">
          <div class="col-1">

          </div>
          <div class="col-10">
            <h1 class="display-1 home-heading">Welcome to Skibble</h1>
            <p class="lead custom-lead">
                Here you find the worlds finest collection of Bullshit. You won't believe your eyes. 
                Our products are some of the worlds leading bullshit items for the worst prices you could possibly
                find them for and yet here you are making us richer.
            </p>
            <h3 class="homepage-sub-heading">Check out some of our best selling products:</h3>
        </div>
          <div class="col-1">

          </div>
        </div>
        <div class="row">
          <div class="col-4 ">
            <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
              <div class="card-body text-center mx-auto">
                  <div class='cvp'>
                      <h5 class="card-title font-weight-bold">Very nice Product</h5>
                      <p class="card-text">$299</p> 
                      <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                      <br/> 
                      <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
              <div class="card-body text-center mx-auto">
                  <div class='cvp'>
                      <h5 class="card-title font-weight-bold">Very nice Product</h5>
                      <p class="card-text">$299</p> 
                      <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                      <br/> 
                      <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
              <div class="card-body text-center mx-auto">
                  <div class='cvp'>
                      <h5 class="card-title font-weight-bold">Very nice Product</h5>
                      <p class="card-text">$299</p> 
                      <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                      <br/> 
                      <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
    <script src="../JavaScript/homepage.js"></script>
</body>
</html>