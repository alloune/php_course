<?php
session_start();

include "database.php";
include "head.php";
include "my-functions.php";
include "catalog.php";
$total_article = 0;
$total_order=0;

?>

<!--<form method="post">-->
<!--<div class="test">-->
<!--    <h2>Test de session</h2>-->
<!--    --><?php //if (isset($_SESSION['name']) && $_SESSION['name'] != "") {
//        echo "Bonjour " . $_SESSION['name'] . ", bievenue sur notre site !";
//
//    } ?>
<!--    <p>Quel est votre nom ?</p>-->
<!--    <input type="text" name="name">-->
<!--    <input type="submit">-->
<!--</form>-->
<!---->
<!--</div>-->
<div class="cart">
<!--    --><?php //= "<pre>";
//    var_dump($_POST);
//    echo "</pre>";



    if (count($_POST) != 0) {
        if ($_POST['quantity'] != 0) {
            echo "on a bien un post valide";
            $mysqlConnection->query(
                "INSERT INTO order_product(quantity, product_id, order_id) 
                          VALUE ('$_POST[quantity]','$_POST[product_id]', '$_POST[order_id]')
                          ");
        }


    }
    $vieworder=$mysqlConnection->query('SELECT * FROM orders WHERE id = 8');
    $value = $vieworder->fetchAll();

    foreach ($value as $innertable){

        if($innertable["id"]==8){
            $display = $mysqlConnection->query('SELECT  SUM(order_product.quantity) AS Total_article, SUM(order_product.quantity * price) AS Total_price 
            FROM `order_product` 
            JOIN products On products.id = product_id
            WHERE order_id = 8;');
            $viewOrder = $display->fetchAll();
            foreach ($viewOrder as $test){
                $total_article = $test['Total_article'];
                $total_order = $test["Total_price"];
            }

        }
    }

     ?>

    <h5>Nombre d'article dans le panier : <?= $total_article?></h5>
    <h5>Cout total :<?= $total_order?> €</h5>
</div>
<div class="productsList">
    <ul>
        <?php

        foreach ($productsList as $product) {
            ?>
            <li class=productsLine>
                <form action="purchase.php" method="post">
                    <img class="productimg" src="<?= $product['image'] ?>" alt="Image de : <?= $product['name'] ?>">
                    <h2><?= $product['name'] ?></h2>
                    <h3><?= $product['price'] ?> €</h3>
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <input type="hidden" name="order_id" value="8">
                    <input class="quantProd" type="number" name="quantity">
                    <input class="purchaseBtn" type="submit" name="validate" value="Ajouter au panier">

                </form>

            </li>
            <?php


        }

        ?>
    </ul>
</div>




