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
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php" tabindex="-1" aria-disabled="true">Register</a>
              </li>
            </ul>
          </div>
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
      <div class="row item-row">
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Apple</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Pear</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Banana</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Berg</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Adrian</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Schnee</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Groggs</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Bonsai</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Mona Lisa</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Yugioh</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Matthias Schlechtbrod</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Beulinger</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Matthias Schlechtpasta</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Tim Leuze</h5>
                    <p class="card-text">$299</p> 
                    <a href="product_page.php" class="btn details px-auto shadow-none">view details</a>
                    <br/> 
                    <a href="product_page.php" class="btn cart px-auto shadow-none no-hover">ADD TO CART</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 product-main-container">
          <div class="card mx-auto col-md-3 col-10 mt-5"> <img class='mx-auto img-thumbnail' src="../images/square.jpg" width="auto" height="auto" />
            <div class="card-body text-center mx-auto">
                <div class='cvp'>
                    <h5 class="card-title font-weight-bold product-search-name">Raffael</h5>
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
    <script src="../JavaScript/search.js"></script>
</body>
</html>