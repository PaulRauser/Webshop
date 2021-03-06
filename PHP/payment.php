<?php
session_name("timlshop");
session_start();
//Check if user is logged in
$logged_in = $_SESSION['logged_in'];
if ($logged_in != true) {
  header('Location: no_access.php');
}

$cart_empty = $_SESSION['emptyCart'];
if(isset($cart_empty) and $cart_empty == true){
  header('Location: shopping_cart.php');  
}

include_once "PHP_Functions/shopping_cart_functions.php";
$personalShoppingCartData = getShoppingCartData($_SESSION["email"] ?? "");
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
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



  <link rel="stylesheet" href="../CSS/payment.css">
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
            <a class="nav-link active" href="index.php">Homepage</a>
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
    <main>
      <div class="py-5 text-center">
        <!-- Hier k??nnte ein Bild stehen! -->
        <h2>Checkout</h2>
        <p class="lead">Please fill in the necessary Informations</p>
      </div>

      <div class="row g-5">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing & shipping address</h4>
          <form class="needs-validation" novalidate method="post" action="send_confirmation_mail.php">
            <div class="row g-3">
              <!-- Basically nicht n??tig, weil man ja schon angemeldet ist mit nem Namen -->
              <!-- <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div> -->

              <div class="col-12">
                <label for="email" class="form-label">Email
                  <!-- <span class="text-muted">(Optional)</span> -->
                </label>
                <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email']; ?>" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for your shipping information.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" id="country" name="country" required>
                  <option value="">Choose...</option>
                  <option> Choose...</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="??land Islands">??land Islands</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antarctica">Antarctica</option>
                  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Bouvet Island">Bouvet Island</option>
                  <option value="Brazil">Brazil</option>
                  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option value="Brunei Darussalam">Brunei Darussalam</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Cote D'ivoire">Cote D'ivoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="Ein Ford Focus">Ein Ford Focus</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Territories">French Southern Territories</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guernsey">Guernsey</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-bissau">Guinea-bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                  <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jersey">Jersey</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                  <option value="Korea, Republic of">Korea, Republic of</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macao">Macao</option>
                  <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                  <option value="Moldova, Republic of">Moldova, Republic of</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="Netherlands Antilles">Netherlands Antilles</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Pitcairn">Pitcairn</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Reunion">Reunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russian Federation">Russian Federation</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Helena">Saint Helena</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                  <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Steinsohn">Steinsohn</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                  <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Timor-leste">Timor-leste</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Viet Nam">Viet Nam</option>
                  <option value="Virgin Islands, British">Virgin Islands, British</option>
                  <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                  <option value="Wallis and Futuna">Wallis and Futuna</option>
                  <option value="Western Sahara">Western Sahara</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>

              <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              <div class="col-md-3">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>

            <hr class="my-4">

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="same-address" required>
              <label class="form-check-label" for="same-address">By placing your order you agree to Skibble??s Conditions of Use & Sale. <br> Please see our Privacy Notice, our Cookies Notice and our Interest-Based Ads Notice.</label>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Select your shipping method</h4>

            <div class="my-3">
              <div class="form-check">
                <input id="fedex" name="shippingMethod" type="radio" class="form-check-input shipping-method" value="3.99" required>
                <label class="form-check-label" for="dpd"><i class="fab fa-fedex"></i> FedEx (3.99???)
                  <!-- DPD hat leider kein Symbol -->
                </label>
              </div>
              <div class="form-check">
                <input id="dhl" name="shippingMethod" type="radio" class="form-check-input shipping-method" required value="8.99">
                <label class="form-check-label" for="dhl"><i class="fab fa-dhl"></i> DHL (8.99???)</label>
              </div>
              <div class="form-check">
                <input id="dhl-express" name="shippingMethod" type="radio" class="form-check-input shipping-method" required value="23.99">
                <label class="form-check-label" for="dhl-express"><i class="fab fa-dhl"></i> DHL Express (23.99???)</label>
              </div>
            </div>

            <script type="text/javascript">
              $(function() {
                $('#dhl').change(function() {
                  $test = $(this).val();
                  $('#shipping-price').html($test);
                });
                $('#fedex').change(function() {
                  $test = $(this).val();
                  $('#shipping-price').html($test);
                });
                $('#dhl-express').change(function() {
                  $test = $(this).val();
                  $('#shipping-price').html($test);
                });
              });
            </script>

            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>

            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input creditRadio" required>
                <label class="form-check-label" for="credit"><i class="fas fa-credit-card"></i> Credit card</label>
              </div>
              <div class="credit collapse  creditCollapse" id="credit">
                <div class="card card-body">
                  <!-- Credit Card -->
                  <div class="row gy-3">
                    <div class="col-md-6">
                      <label for="cc-name" class="form-label ">Name on card</label>
                      <input type="text" class="form-control creditInputs" id="cc-name" placeholder="" required>
                      <small class="text-muted">Full name as displayed on card</small>
                      <div class="invalid-feedback">
                        Name on card is required
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label for="cc-number" class="form-label ">Credit card number</label>
                      <input type="text" class="form-control creditInputs" id="cc-number" placeholder="">
                      <div class="invalid-feedback">
                        Credit card number is required
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="cc-expiration" class="form-label ">Expiration</label>
                      <input type="text" class="form-control creditInputs" id="cc-expiration" placeholder="">
                      <div class="invalid-feedback">
                        Expiration date required
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="cc-cvv" class="form-label">CVV</label>
                      <input type="text" class="form-control creditInputs" id="cc-cvv" placeholder="">
                      <div class="invalid-feedback">
                        Security code required
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input paypalRadio" required>
                <label class="form-check-label" for="paypal"><i class="fab fa-paypal"></i> PayPal </label>
              </div>

              <div class="paypal collapse  paypalCollapse" id="credit">
                <div class="card card-body">
                  <!-- Paypal -->
                  <!-- Credit Card -->
                  <div class="row gy-3">
                    <div class="col-md-6">
                      <label for="cc-name" class="form-label ">Email address </i> </label>
                      <input type="email" class="form-control paypalInputs" id="cc-name" placeholder="">
                      <!-- <small class="text-muted">Paypal-Email</small> -->
                      <div class="invalid-feedback">
                        Enter your Paypal email address
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label for="cc-number" class="form-label ">Password</label>
                      <input type="password" class="form-control paypalInputs" id="cc-number" placeholder="">
                      <div class="invalid-feedback">
                        Password is required
                      </div>
                    </div>
                  </div>

                </div>


              </div>

              <hr class="my-4">

              <button class="w-100 btn btn-success btn-lg bottom-button" type="submit" name="button2" value="2">Buy now</button>

              <div class="col-md-5 col-lg-4 order-md-last side-thing">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-success">Your cart</span>
                </h4>
                <ul class="list-group mb-3">

                  <?php
                  foreach ($personalShoppingCartData["pData"] as $product) { ?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                      <div>
                        <h6 class="my-0"><?php echo $product["amount"];
                                          echo "x ";
                                          echo $product["name"];  ?></h6>
                        <small class="text-muted"><?php echo $product["header"]; ?></small>
                      </div>
                      <span class="text-muted"><?php echo $product["regular_price"]; ?>??? </span>
                    </li>
                  <?php } ?>

                  <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                      <h6 class="my-0">Discount <br> <small> Buy 10 or more products of one kind to get 15% off </small> </h6>
                    </div>
                    <span class="text-success"><?php $Discount = $personalShoppingCartData["regular_sum"] - $personalShoppingCartData["discounted_sum"];
                                                echo $Discount; ?>???</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0">Shipping</h6>
                      <!-- <small class="text-muted">Hier soll die ausgew??hlte Shippingmethode auftauchen</small> -->
                    </div>
                    <span class="text-muted" style="position: absolute; right: 30px;" id="shipping-price">
                      <!-- Hier stehen die Kosten der ausgew??hlten Zahlungsmethode  -->
                    </span>
                    <div>???</div>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <strong>
                      <div id="total-price" style="position: absolute; right: 30px">

                      </div> ???
                      <script>
                        // $('')
                        // let shippingPrice = document.querySelector('#shipping-price').val();
                        // let totalPrice = priceWithoutShipping + shippingPrice;
                        $(function() {
                          $('#dhl').change(function() {
            
                            $totalPrice = parseFloat(<?php echo $personalShoppingCartData["discounted_sum"]; ?>) + parseFloat($(this).val());
                            $totalPrice = Math.round($totalPrice * 100) / 100
                            $('#total-price').html($totalPrice);
                            $('#post-total-price').val($totalPrice);
                            $('#post-shipping-method').val('DHL');
                          });
                          $('#dhl-express').change(function() {
                            $totalPrice = parseFloat(<?php echo $personalShoppingCartData["discounted_sum"]; ?>) + parseFloat($(this).val());
                            $totalPrice = Math.round($totalPrice * 100) / 100
                            $('#total-price').html($totalPrice);
                            $('#post-total-price').val($totalPrice);
                            $('#post-shipping-method').val('DHL-Express');
                          });
                          $('#fedex').change(function() {
                            $totalPrice = parseFloat(<?php echo $personalShoppingCartData["discounted_sum"]; ?>) + parseFloat($(this).val());
                            $totalPrice = Math.round($totalPrice * 100) / 100
                            $('#total-price').html($totalPrice);
                            $('#post-total-price').val($totalPrice);
                            $('#post-shipping-method').val('FedEx');

                          });
                        });
                      </script>

                    </strong>
                    <!-- total price -->
                    <input type="hidden" id="post-total-price" name="post-total-price" value="">
                    <!-- shipping method -->
                    <input type="hidden" id="post-shipping-method" name="post-shipping-method" value="">
                  </li>
                </ul>

                <!-- <form class="card p-2">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Promo code">
                  <button type="submit" class="btn btn-outline-success">Redeem</button>
                </div>
              </form> -->

                <div class="card p-2 buynowpromo sidebutton">
                  <!-- Hier wird ein Buy now hingeschrieben -->
                  <button class="w-100 btn btn-success" type="submit" name="button1" value="1">Buy now</button>
                </div>



              </div>


          </form>
        </div>
      </div>
    </main>

  </div>

  <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

  <script src="../JavaScript/payment.js"></script>

  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>