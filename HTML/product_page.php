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
                      <img src="../images/Bild1.jpg" class="d-block w-100 product-page-image" alt="">
                    </div>
                    <div class="carousel-item product-carousel-item">
                      <img src="../images/Bild2.jpg" class="d-block w-100 product-page-image" alt="">
                    </div>
                    <div class="carousel-item product-carousel-item">
                      <img src="../images/Bild3.jpg" class="d-block w-100 product-page-image" alt="">
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
                    <h3 class="product-section-header">Product Name</h3>
                    <div class="product-page-price">$29.99</div>
                    <div class="product-page-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="page-rating-text">123 Reviews</span>
                    </div>
                    <div class="product-description-heading">
                        The best shit you can buy.
                    </div>
                    <div class="product-description-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Corporis quis voluptas aspernatur sed autem 
                        <br><br> obcaecati optio neque minima laudantium ad repellendus
                        porro laboriosam alias, natus minus error adipisci 
                        accusamus? A esse culpa veritatis repudiandae porro
                    </div>
                    <form class="product-quantity" action="#">
                        <span class="quantity-text">Quantity:</span>
                        <div class="form-outline number-input">
                            <input type="number" id="typeNumber" class="form-control shadow-none" value="1" min="1" max="100" onkeydown="if(event.key==='.' | event.key===','){event.preventDefault();}"/>
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