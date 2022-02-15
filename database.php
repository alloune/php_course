<?php
try {
    $mysqlConnection = new PDO(
        'mysql:host=localhost;dbname=sellsdb;charset=utf8',
        'allan',
        'Chacha38'

    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//SELECT ALL PRODUCTS

$selectAllProducts = $mysqlConnection->query('SELECT * FROM `products`');
$productsList = $selectAllProducts->fetchAll();

//SELECT ALL CUSTOMERS

$selectAllCust = $mysqlConnection->query('SELECT first_name, last_name FROM customers');
$custList = $selectAllCust->fetchAll();

//VIEW ORDER COST

$allOrdersCost = $mysqlConnection->query(
    'SELECT number, sum(order_product.quantity*price) as Total_Price
FROM `order_product`
          JOIN products ON products.id = product_id
          JOIN orders ON orders.id = order_id
GROUP BY number');

$ordersCost = $allOrdersCost->fetchAll();

//View order between 100 and 500 €
$costbt100n500 = $mysqlConnection->query('SELECT number, SUM(price *order_product.quantity ) as Total
FROM order_product
         INNER JOIN orders ON orders.id = order_id
         INNER JOIN products ON products.id = product_id
WHERE Total BETWEEN 100 AND 500
GROUP BY number');
$finalSort = $costbt100n500 ->fetchAll();





