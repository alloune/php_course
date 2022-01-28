<?php

include "head.php";
include "my-functions.php";
include "catalog.php";

?>
    <div class ="products">
        <?php





        ?>
<!--//FAIRE DES BOUCLES POUR AFFICHER TOUT CA + mettre au propre les fonctions -->



            <div class = "iPhone">
                <form method="post" action="cart.php">
                <h2>Iphone</h2>
                <img src="<?php echo $products['iPhone']['picture_url']?>">
                <p>Iphone Blue Ciel</p>
                <p>Prix : <?echo $priceiPhone=formatPrice($products['iPhone']['price'])?> </p>
                    <p> non remisé </p>
                    <input type="number" name="nbOfArticle"><br>
                    <input type="hidden" name="article" value="iPhone">
                    <input type="hidden" name="price" value="<?= $priceiPhone?>">
                <input type="submit" value="Acheter !">
                </form>

            </div>
            <div class = "iPad">
                <form method="post" action="cart.php">
                <h2>IPad</h2>
                <img src="<?php echo $products['iPad']['picture_url']?>">
                <p>Iphone Blue Ciel</p>
                    <p><del>Prix : <?echo $priceiPad=formatPrice($products['iPad']['price'])?> </del></p>
                <p>Prix : <?echo formatPrice(displayDiscountedPrice($products['iPad']['price'],50))?> €</p>
                <input type="number" name="nbOfArticle"><br>
                    <input type="hidden" name="article" value="iPad">
                    <input type="hidden" name="price" value="<?= $priceiPad?>">
                <input type="submit" value="Acheter !">
                </form>
            </div>
            <div class = "iMac">
                <form method="post" action="cart.php">
                <h2>IMac</h2>
                <img src="<?php echo $products['iMac']['picture_url']?>">
                <p>Iphone Blue Ciel</p>
                <p><del>Prix : <?echo $priceImac = formatPrice($products['iMac']['price'])?> </del></p>
                <p>Prix : <?echo formatPrice(displayDiscountedPrice($products['iMac']['price'],30))?> €</p>
                <input type="number" name="nbOfArticle"><br>
                <input type="hidden" name="article" value="iMac">
                <input type="hidden" name="price" value="<?= $priceImac?>">
                <input type="submit" value="Acheter !">
                </form>
            </div>



    </div>

<!---->

