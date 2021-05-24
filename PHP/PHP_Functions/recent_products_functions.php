<?php
    include_once 'product_functions.php';
    include_once 'shopping_cart_functions.php';

    function getOrdersByUserId($user_id) {
        //array[order.id, array[name, condition, header, recent_amount, discounted_price], discounted_sum, date]
        $orderArray = array();

        $conn = openDatabase();
        $sqlGetOrdersByUserId = 'SELECT orders.id, name, orders_products.price as price, conds, orders_products.amount, total_price, orders.date as date 
        FROM orders_products INNER JOIN orders ON (orders.id = orders_products.order_id) 
        INNER JOIN products ON (products.id = orders_products.product_id) 
        WHERE fk_user=? ORDER BY date DESC';
        $stmt = $conn->prepare($sqlGetOrdersByUserId);
        $stmt->execute([$user_id]);

        $data = $stmt->fetchAll();


        closeDatabase($conn);

        return $data;
    } 
?>