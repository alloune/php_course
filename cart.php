<?php
include "head.php";
include "my-functions.php";

?>

<div class="panier">

    <h2>PANIER</h2>
<div class="recap">
    <div class="finalProducts">



        <table>
            <thead>
                <tr>
                    <th colspan="3">Récapitulatif des produits selectionnés</th>

                </tr>
                <tr>
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td><?=$_REQUEST["article"] ?></td>
                <td><?=$_REQUEST["nbOfArticle"]?></td>
                <td><?=$_REQUEST["price"]." €"?></td>
            </tr>
            </tbody>

        </table>
    </div>
    <div class="price">
        <h3>Prix</h3>

        <p><br><br>Pour <?=$_REQUEST["nbOfArticle"] ." " .$_REQUEST["article"] ?> le cout total est de : <?=$total = ($_REQUEST["nbOfArticle"] * $_REQUEST["price"])." €"?> </p>
        <p>Vous bénéficiez exceptionnellement d'une remise de <?= ($remise =25) . "%"; ?></p>
        <p class="finalPrice">Prix après reduction : <?= $totalDiscounted = displayDiscountedPrice(intval($total), $remise)." €";?></p>
        <p class="htPrice">Prix HT : <?= priceExcludingVAT(intval($totalDiscounted)). " €" ?></p>
    </div>
</div>
</div>
