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
        <h1 class="shopping-cart-heading">Your Shopping Cart</h1>
        <div class="row">
          <div class="col-12 legend">Preis</div>
                   
          <div class="container-fluid col-12 shopping-cart-pos">
            <hr>            
            <div class="col-3 shopping-cart-pos-img-box" id="productImage" name="productImage">
              <img class="img-thumbnail shopping-cart-pos-img" src="../images/Bild1.jpg" alt="Tolles Produkt"/>
            </div>
            <div class="col-8" id="productText" name="productDescription">
              <div class="card shopping-cart-pos-description">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" placeholder="3" aria-label="amount" aria-describedby="updateAmount" min="0" max="100"
                            onkeydown="if(event.key==='.' | event.key===',' | event.key==='-' | event.key==='+'){event.preventDefault();}">
                          <button class="btn btn-outline-success" type="button" id="updateAmount" name="updateAmount">Update Amount</button>
                          <button class="btn btn-outline-success" type="button">Remove</button>
                        </div>
                      </li>                                        
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-1 shopping-cart-pos-price" id="productPrice" name="productPrice">12,89€</div>
          <hr>
          </div> 
          <div class="container-fluid col-12 shopping-cart-pos">
            <hr>            
            <div class="col-3 shopping-cart-pos-img-box" id="productImage" name="productImage">
              <img class="img-thumbnail shopping-cart-pos-img" src="../images/Bild1.jpg" alt="Tolles Produkt"/>
            </div>
            <div class="col-8" id="productText" name="productDescription">
              <div class="card shopping-cart-pos-description">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" placeholder="3" aria-label="amount" aria-describedby="updateAmount" min="0" max="100"
                            onkeydown="if(event.key==='.' | event.key===',' | event.key==='-' | event.key==='+'){event.preventDefault();}">
                          <button class="btn btn-outline-success" type="button" id="updateAmount" name="updateAmount">Update Amount</button>
                          <button class="btn btn-outline-success" type="button">Remove</button>
                        </div>
                      </li>                                        
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-1 shopping-cart-pos-price" id="productPrice" name="productPrice">12,89€</div>
          <hr>
          </div>
          <div class="container-fluid col-12 shopping-cart-pos">
            <hr>            
            <div class="col-3 shopping-cart-pos-img-box" id="productImage" name="productImage">
              <img class="img-thumbnail shopping-cart-pos-img" src="../images/Bild1.jpg" alt="Tolles Produkt"/>
            </div>
            <div class="col-8" id="productText" name="productDescription">
              <div class="card shopping-cart-pos-description">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <div class="input-group mb-3">
                          <form action="">
                            <input type="number" class="form-control" placeholder="3" aria-label="amount" aria-describedby="updateAmount" min="0" max="100" 
                              onkeydown="if(event.key==='.' | event.key===',' | event.key==='-' | event.key==='+'){event.preventDefault();}">
                            <button class="btn btn-outline-success" type="submit" id="updateAmount" name="updateAmount">Update Amount</button>
                            <button class="btn btn-outline-success" type="button">Remove</button>
                          </form>
                        </div>
                      </li>                                        
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-1 shopping-cart-pos-price" id="productPrice" name="productPrice">12,89€</div>
          <hr>
          </div>         
        </div>

        <div class="container">
          <div class="row justify-content-end">
            <div class="col-2 shopping-cart-sum">             
              <p id="totalPrice" name="totalPrice">Sum: 39,00 €</p> 
            </div>
          </div>
        </div>
        

        <div class="proceed-to-checkout">
        <a href="payment.php" class="btn btn-warning" role="button" aria-pressed="true">
        <i class="far fa-credit-card"></i>&nbsp Proceed to Checkout</a>
        </div>

      </div>
      

      <script src="../node_modules/jquery/dist/jquery.js"></script>
      <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
      <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>
</body>
</html>