<?php
session_start();

include "database.php";



include "head.php";
include "my-functions.php";
include "catalog.php";

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
<div class="productsList">
    <ul>
        <?php

        foreach ($productsList as $product) {
            ?>
            <li class=productsLine>
                <form action="delete.php" method="post">
                    <img class="productimg" src="<?= $product['image'] ?>" alt="Image de : <?= $product['name'] ?>">
                    <h2><?= $product['name'] ?></h2>
                    <h3><?= $product['price'] ?> €</h3>
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <input class="deletebtn" type="submit" value="Supprimer l'article">
                </form>

            </li>
            <?php


        }

        ?>
    </ul>
</div>
<div class=addProduct>
    <form method="post" action="insert.php">
        <input type="text" name="name" placeholder="nom du produit">
        <input type="text" name="price" placeholder="prix du produit">
        <input type="text" name="weight" placeholder="poids unitaire">
        <input type="radio" name="avaible" id="oui" value="1">
        <label for="oui">Oui</label>
        <input type="radio" name="avaible" id="non" value="0">
        <label for="non">Non</label>
        <input type="text" name="description" placeholder="description">
        <input type="text" name="image" placeholder="Lien de l'image">
        <input type="number" name="quantity" placeholder="Quantité disponible">
        <input type="submit" value="Ajouter mon produit">


    </form>


</div>



