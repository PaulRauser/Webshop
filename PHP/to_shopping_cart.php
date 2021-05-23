<?php 
    session_name("timlshop");
    session_start();
    //Check if user is logged in
    $logged_in = $_SESSION['logged_in'];
    if ($logged_in != true) {
      header('Location: no_access.php');
    }
?>

<?php 
    include 'PHP_Functions/product_functions.php';
    $amount = $_POST['amount-input'];
    $product_number = $_POST['product-number'];

    $email = $_SESSION['email'];

    addToShoppingCartLogic($amount, $email, $product_number);
?>