<?php
session_start();

include "database.php";


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

//        echo "<pre>";
//        var_dump($_SESSION);
//        echo "</pre>";
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
    <?php

    foreach($productsList as $product){

        echo "<br>" . $product['name'] ;

    }

    ?>
</div>
<div class="custList">
    <?php

    foreach($custList as $cust){

     echo "<br>" . $cust['first_name']. " , " . $cust['last_name'] ;

    }

    ?>
</div>
<div class="custList">
    <?php

    foreach($ordersCost as $cost){

     echo "<br> Commande numéro : " . $cost['number']. "<br> Cout total :  " . $cost['Total_Price'] . " €";

    }


    ?>
</div>
<div class="100n500List">
    <?php

    foreach($finalSort as $unit){

        echo "<br> Commande numéro : " . $unit['number']. "<br> Cout total :  " . $unit['Total'] . " €";



    }

//    echo "<pre>";
//    var_dump($unit);
//    echo "</pre>";
    ?>
</div>
<div class = addProduct>
    <form>
        <input type="text" name="name" placeholder="nom du produit">
        <input type="text" name="price" placeholder="prix du produit">
        <input type="text" name="weight" placeholder="poids unitaire">
        <input type="radio" id="oui" value ="oui">
        <label for="oui">Oui</label>
        <input type="radio" id="non" value ="non">
        <label for="non">Non</label>
        <input type="text" name="description" placeholder="description">
        <input type="text" name="img" placeholder="Lien de l'image">
        <input type="number" name="quantity" placeholder="Quantité disponible">
        <input type="submit" value="Ajouter mon produit">
        <?php
        $insertProducts = $mysqlConnection->prepare('INSERT INTO products(name, price, weight, avaible, description,quantity,image');
        ?>



    </form>






</div>



