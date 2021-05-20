<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>

    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/login_styles.css">

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
      <a href="profile.php" class="btn btn-outline-success left" role="button" aria-pressed="true" style="margin-right: 10px;">
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
            <form class="form-horizontal login-form" method="POST" action="#" >
                <fieldset>
                
                <!-- Form Name -->
                <legend class="login-legend">Login </legend>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class=" control-label" for="textinput">Enter your Email:</label>  
                  <div class="">
                  <input id="textinput" required name="textinput" type="email" placeholder="email-address" class="form-control input-md custom-login-input" >
                  </div>
                </div>
                
                <!-- Password input-->
                <div class="form-group">
                  <label class=" control-label" for="passwordinput">Enter your Password:</label>
                  <div class="">
                    <input id="passwordinput" required name="passwordinput" type="password" placeholder="password" class="form-control input-md custom-login-input">
                  </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                  <label class=" control-label" for="singlebutton"></label>
                  <div class="">
                    <button id="singlebutton" name="singlebutton" type="submit" class="btn btn-success custom-login-button">Login</button>                 
                  </div>
                </div>
                
                </fieldset>
                <div class="additional-login-content">
                  <div class="create-account login-text"><a class="register-link" href="register.php">Register Now</a></div>
                  <div class="forgot-password login-text"><a class="register-link" href="forgot_password.php">Forgot your Password?</a></div>
                </div>

                <?php
                  //echo $_POST['passwordinput']; 
                  echo hash ( "sha512", $_POST['passwordinput'] , false ) ;
                ?>

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