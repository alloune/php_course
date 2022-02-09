<?php
session_start();

if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = $_POST['name'];
};
include "head.php";
include "my-functions.php";
include "catalog.php";

?>
<form method="post" action="cart.php">
    <div class="products">
        <?php

        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
        global $products;
        foreach ($products as $key => $value) {
            echo
                "<div class =\"displayProducts\">
                            <h2>" . $key . "</h2>
                            <img src=" . $value["picture_url"] . " alt='image'>
                            <p>" . $value["name"] . "</p>
                            <p>Poids : " . $value["weight"] . " g</p>
                            <p>Prix : " . formatPrice($value["price"]) . "</p>
                            <input type='number' name=giveInf[$key][quantity]><br>                       
                            <input type='checkbox' name=giveInf[$key][checkbox] value='1'>
                            </div>";
        }
        ?>

    </div>
    <input class="submit" type="submit" value="Valider ma selection">
</form>
<form method="post">
<div class="test">
    <h2>Test de session</h2>
    <?php if (isset($_SESSION['name']) && $_SESSION['name'] != "") {
        echo "Bonjour " . $_SESSION['name'] . ", bievenue sur notre site !";

    } ?>
    <p>Quel est votre nom ?</p>
    <input type="text" name="name">
    <input type="submit">
</form>
</div>


