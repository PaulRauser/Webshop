<?php
include 'PHP_Functions/product_functions.php'; 
session_name("timlshop");
session_start();
  //Check if user is logged in
  // $logged_in = $_SESSION['logged_in'];
  // if($logged_in == true) {
  //   header('Location: index.php');
  // }
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
    
    <link rel="stylesheet" href="../CSS/product.css">
    
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
                <a id="active" class="nav-link active" href="products.php">Products</a>
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
      <h1 class="products-heading">View all of our insane products</h1>
      <form action="">
        <div class="input-group mb-3 search-input">
          <input id="bumsen" type="text" class="form-control shadow-none search-text-input" placeholder="Search in Products">
        </div>
      </form>
    </div>
    <div class="container product-container">
      <div class="row item-row all-products">
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(1, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(1, 'name');?></h5>
                    <p class="card-text"><?php getProductData(1, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(2, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(2, 'name');?></h5>
                    <p class="card-text"><?php getProductData(2, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(3, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(3, 'name');?></h5>
                    <p class="card-text"><?php getProductData(3, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(4, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(4, 'name');?></h5>
                    <p class="card-text"><?php getProductData(4, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(5, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(5, 'name');?></h5>
                    <p class="card-text"><?php getProductData(5, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(6, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(6, 'name');?></h5>
                    <p class="card-text"><?php getProductData(6, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(7, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(7, 'name');?></h5>
                    <p class="card-text"><?php getProductData(7, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(8, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(8, 'name');?></h5>
                    <p class="card-text"><?php getProductData(8, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(9, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(9, 'name');?></h5>
                    <p class="card-text"><?php getProductData(9, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(10, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(10, 'name');?></h5>
                    <p class="card-text"><?php getProductData(10, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(11, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(11, 'name');?></h5>
                    <p class="card-text"><?php getProductData(11, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(12, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(12, 'name');?></h5>
                    <p class="card-text"><?php getProductData(12, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/<?php getProductData(13, 'image_cover'); ?>" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name"><?php getProductData(13, 'name');?></h5>
                    <p class="card-text"><?php getProductData(13, 'price'); ?>€</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">More Details</a>
                    <br/> 
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
    <script src="../JavaScript/search.js"></script>
</body>
</html>