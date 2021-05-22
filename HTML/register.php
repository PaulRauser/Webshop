<?php

function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if ((isset($_POST['email-input']) and isset($_POST['first-name-input']) and isset($_POST['last-name-input'])
    and isset($_POST['gender-input']) and isset($_POST['city-input']) and isset($_POST['country-input']))) {

    // array(6) { ["first-name-input"]=> string(3) "ghg" ["city-name-input"]=> string(5) "ghjgh" ["email-input"]=> s
    // tring(11) "ghhjghjh@dg" ["gender-input"]=> string(7) "option2" ["city-input"]=> string(4) "jghh"
    // ["country-input"]=> string(6) "France" }

    try {
        // Datenbank settings
        $datenbankname = "timl";
        $benutzername = "tim";
        $benutzerpasswort = "q9Xlx6Hk7Vpl";
        $servername = "chelex.life";

        $sEmail = $_POST['email-input'];
        $sFirstName = $_POST['first-name-input'];
        $sLastName = $_POST['last-name-input'];
        $sGender = $_POST['gender-input'];
        $sCity = $_POST['city-input'];
        $sCountry = $_POST['country-input'];
        // $sZip = $_POST['zip-input'];
        // $sStreet = $_POST['street-input'];
        $sDuplicate = false;
        $sActive = 0;


        // Verbindung zur Datenbank
        $conn = new PDO("mysql:host=$servername;dbname=$datenbankname", $benutzername, $benutzerpasswort);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sqlCheckForEmailDuplicates = "SELECT COUNT(*) AS c FROM user WHERE email=?";
        $stmt = $conn->prepare($sqlCheckForEmailDuplicates);
        $stmt->execute([$sEmail]);

        $rowCount = $stmt->fetch();

        if ((int)($rowCount["c"]) != 0) {
            echo "Email gibt es schon";
            $sDuplicate = true;
        }

        
        session_name("timlshop");
        session_start();
        $generatedPassword = randomPassword();
        // SQL
        // Login Daten überprüfen
        // $sqlGetUserInfo = "SELECT (email,pwd) FROM user WHERE email=?";

        
        // Login-Daten werden ausgegeben
        if ($sDuplicate == false) {
            $sqlUpdateUser = "INSERT into user (email, first_name, last_name, gender, city, country, pwd, first_login, active) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sqlUpdateUser);
            $stmt->execute([$sEmail, $sFirstName, $sLastName, $sGender, $sCity, $sCountry, hash("sha512", $generatedPassword), 1, $sActive]);
        }



        // header('Location: products.php');
        // header('Location: products.php');
        echo "Das generierte Passwort ist " . $generatedPassword;

         //Hier probier ich in mail_test.php zu übergeben, klappt aber noch nicht. Checkt mal warum
        $_SESSION['generatedPassword'] = $generatedPassword;
        $_SESSION['first_login'] = true;
        $_SESSION['email'] = $sEmail;
        //Close connection
        $conn = null;

        header("Location: mail_test.php");
    } catch (PDOException $e) {
        $handle = fopen("error_addfriend.txt", "w");
        fwrite($handle, $e->getMessage());
        echo $e->getMessage();
        fclose($handle);
    }
}

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

    <link rel="stylesheet" href="../CSS/login_styles.css">
    <link rel="stylesheet" href="../CSS/register.css">

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
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a id="active" class="nav-link active" href="register.php" tabindex="-1" aria-disabled="true">Register</a>
                    </li>
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
                      }, 100);
                  });

                // function reload() {
                //     $.get("active_logins.php", {
                //             auswahl: 1 * new Date()
                //         },
                //         function(daten) {
                //             $('#active-users').html(daten);
                //         });
                // }
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
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">
                <div class="register-text">
                    <h1>Register</h1>
                </div>
                <form class="register-form" method="POST" action="#">
                    <div class="form-row">
                        <div class="col form-group spacer">
                            <label>First name *</label>
                            <input name="first-name-input" required type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        <div class="col form-group spacer">
                            <label>Last name *</label>
                            <input name="last-name-input" required type="text" class="form-control" placeholder=" ">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->
                    <div class="form-group spacer">
                        <label>Email address *</label>
                        <!-- onchange="reload();" -> In input -->
                        <input required type="email" name="email-input" id="email-input" value="" class="form-control" placeholder="">
                        <small class="form-text text-muted">
                            <div id="duplicate-user" style="margin-top: 10px; color:#d00000;"></div>
                        </small>

                    </div> <!-- form-group end.// -->
                    <div class="form-group spacer">
                        <div class="gender-div">Gender *</div>
                        <label class="form-check form-check-inline">
                            <input name="gender-input" required class="form-check-input" type="radio" name="gender" value="option1">
                            <span class="form-check-label"> Male </span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input name="gender-input" required class="form-check-input" type="radio" name="gender" value="option2">
                            <span class="form-check-label"> Female</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input name="gender-input" required class="form-check-input" type="radio" name="gender" value="option3">
                            <span class="form-check-label"> Other</span>
                        </label>
                    </div> <!-- form-group end.// -->
                    <div class="form-row">
                        <div class="form-group spacer col-md-6">
                            <label>City *</label>
                            <input name="city-input" required type="text" class="form-control">
                        </div> <!-- form-group end.// -->
                        <div class="form-group spacer col-md-6">
                            <label>Country</label>
                            <select name="country-input" id="inputState" class="form-control">
                                <option> Choose...</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
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
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of
                                    The
                                </option>
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
                                <option value="Egypt">Ein Ford Focus</option>
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
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic
                                    of
                                </option>
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
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                                    Republic of
                                </option>
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
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                                    Sandwich Islands
                                </option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
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
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                                </option>
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
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->
                    <div class="form-group spacer">
                        <button type="submit" class="btn btn-success btn-block"> Register</button>
                    </div> <!-- form-group// -->
                    <div class="text-muted spacer bottom-spacer">By clicking the 'Sign Up' button, you confirm that you
                        accept our <br> Terms of use and Privacy Policy.
                    </div>
                    <div class="btn btn-success login-instead-button"><a href="login.php">Login instead</a></div>
                </form>
            </div>
            <div class="col-1">

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $.get("benutzer_doppelt.php", {
                        email: $("#email-input").val()
                    },
                    function(daten) {
                        $('#duplicate-user').html(daten);
                    });
            }, 1000);
        });
    </script>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>