<?php 
    // var_dump($_POST);
    include_once "PHP_Functions/product_functions.php";
    include_once "PHP_Functions/recent_products_functions.php";
    include_once "PHP_Functions/shopping_cart_functions.php";

    session_name("timlshop");
    session_start();

    $order_id= $_POST['order_id'];

    function orderAgain($order_id) {
        $conn = openDatabase();

        $sqlGetOrderedProducts = "SELECT order_id, product_id, amount, price FROM orders_products WHERE order_id=?";
        $stmt = $conn->prepare($sqlGetOrderedProducts);
        $stmt->execute([$order_id]);

        $products = $stmt->fetchAll();



        $sqlGetOrder = "SELECT id, fk_user, shipping_method, total_price FROM orders WHERE id=?";
        $peter = $conn->prepare($sqlGetOrder);
        $peter->execute([$order_id]);

        $order = $peter->fetch();

        
        $fk_user = $order['fk_user'];
        $shipping_method = $order['shipping_method'];
        $total_price = $order['total_price'];

        $sqlAddNewOrder = "INSERT into orders (fk_user, shipping_method, total_price) VALUES (?,?,?)";
        $peter = $conn->prepare($sqlAddNewOrder);
        $peter->execute([$fk_user, $shipping_method, $total_price]);

        $sqlGetPreviousOrderID = "SELECT id FROM orders WHERE fk_user=? ORDER BY id DESC LIMIT 1";
        $frank = $conn->prepare($sqlGetPreviousOrderID);
        $frank->execute([$fk_user]);

        $newId = $frank->fetch()["id"];

    

        //Products hinzufügen
        foreach($products as $product) {
            $product_id = $product['product_id'];
            $amount = $product['amount'];
            $price = $product['price'];


            $sqlAddToProducts = "INSERT INTO orders_products (order_id, product_id, amount, price) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sqlAddToProducts);
            $stmt->execute([$newId, $product_id, $amount, $price]);
        }


 

        $ordered_products = "";

        $_SESSION["shipping_method"] = $shipping_method;
        $_SESSION["total_price"] = $total_price;
        $product_amount = 0;

        foreach($products as $product) {
            $ordered_products .= $product['amount'] . 'x ' .  getOrderProductName($product['product_id']) . ', ';
            $product_amount = $product_amount + 1;
        }

        $_SESSION["ordered_products"] = $ordered_products;
        $_SESSION["product_amount"]  = $product_amount ;

        closeDatabase($conn);
        header("Location: order_again_mail.php");
    }

    orderAgain($order_id);

?>
<!-- Es muss eine neue order mit neuer order id erstellt und zur Datenbank hinzugefügt werden -->

<!-- Hier noch zu order again mail weiterleiten -->