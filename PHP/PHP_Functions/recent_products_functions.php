<?php
    include_once 'product_functions.php';
    include_once 'shopping_cart_functions.php';

    function getAllOrderDataByUserId($user_id) {
        //array[order.id, discounted_sum, date, array[name, condition, header, recent_amount, discounted_price]]
        $orderArray = array();

        $conn = openDatabase();
        $getAllOrderDataByUserId = 'SELECT orders.id, name, orders_products.price as price, conds, orders_products.amount, total_price, orders.date as date 
        FROM orders_products INNER JOIN orders ON (orders.id = orders_products.order_id) 
        INNER JOIN products ON (products.id = orders_products.product_id) 
        WHERE fk_user=? ORDER BY date DESC';
        $stmt = $conn->prepare($getAllOrderDataByUserId);
        $stmt->execute([$user_id]);

        $orderArray = $stmt->fetchAll();

        closeDatabase($conn);

        return $orderArray;
    } 

    // alles crap wenn das oben funktioniert

    function getOrdersByUserId($user_id) {
        //array[order.id, discounted_sum, date]

        $conn = openDatabase();
        $sqlGetOrdersByUserId = "SELECT id, total_price as price, date FROM orders WHERE fk_user=?";
        $stmt = $conn->prepare($sqlGetOrdersByUserId);
        $stmt->execute([$user_id]);

        $orderArray = $stmt->fetchAll();

        closeDatabase($conn);

        return $orderArray;
    } 


    function getOrderProducts($orderId) {
        $conn = openDatabase();

        $getOrderProducts = "SELECT product_id, amount, price date FROM orders WHERE order_id=?";
        $stmt = $conn->prepare($getOrderProducts);
        $stmt->execute([$orderId]);

        $orderArray = $stmt->fetchAll();

        closeDatabase($conn);

        return $orderArray;
    }

    function getOrderProductInformation($productId) {
        $conn = openDatabase();

        $getOrderProductInformation = "SELECT name, conds, header, image_cover FROM orders WHERE order_id=?";
        $stmt = $conn->prepare($getOrderProductInformation);
        $stmt->execute([$productId]);

        $orderArray = $stmt->fetchAll();

        closeDatabase($conn);

        return $orderArray;
    }
?>