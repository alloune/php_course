<?php

include "head.php";
include "my-functions.php";
include "catalog.php";

?>
    <div class ="products">
<!--// mettre au propre les fonctions -->

            <?php
            global $products;
                foreach ($products as $key => $value){
                   echo
                       "<div class =\"".$key."\">
                            <form method=\"post\" action=\"cart.php\">
                            <h2>".$key."</h2>
                            <img src=".$value["picture_url"]." alt='image'>
                            <p>".$value["name"]."</p>
                            <p>Poids : ".$value["weight"]." g</p>
                            <p>Prix : ".formatPrice($value["price"])."</p>
                            <input type=\"number\" name=\"nbOfArticle\"><br>
                            <input type=\"hidden\" name=\"article\" value='".$key."'>
                            <input type='hidden' name='transp' value='la_poste'>
                            <input type='submit' value='Acheter !'>
                            </form>
                            </div>";
                }

            ?>
    </div>

