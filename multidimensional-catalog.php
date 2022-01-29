<?php

include "head.php";
include "my-functions.php";
include "catalog.php";

?>
    <div class ="products">
        <?php





        ?>
<!--//FAIRE DES BOUCLES POUR AFFICHER TOUT CA + mettre au propre les fonctions -->

            <?php
                foreach ($products as $key => $value){
                   echo
                       "<div class =\"".$key."\">
                            <form method=\"post\" action=\"cart.php\">
                            <h2>".$key."</h2>
                            <img src=".$products[$key]["picture_url"]."
                            </form>
                            </div>";








                }


            ?>

<!--            <div class = "iPhone">-->
<!--                <form method="post" action="cart.php">-->
<!--                <h2>Iphone</h2>-->
<!--                <img src="--><?php //echo $products['iPhone']['picture_url']?><!--">-->
<!--                <p>Iphone Blue Ciel</p>-->
<!--                <p>Prix : --><?//echo $priceiPhone=formatPrice($products['iPhone']['price'])?><!-- </p>-->
<!--                    <p> non remisé </p>-->
<!--                    <input type="number" name="nbOfArticle"><br>-->
<!--                    <input type="hidden" name="article" value="iPhone">-->
<!--                    <input type="hidden" name="price" value="--><?//= $priceiPhone?><!--">-->
<!--                <input type="submit" value="Acheter !">-->
<!--                </form>-->
<!---->
<!--            </div>-->




    </div>

<!---->

