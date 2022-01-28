<?php
include "head.php";
include "my-functions.php";
include "catalog.php";
if(empty($_REQUEST["nbOfArticle"]) || $_REQUEST["nbOfArticle"]<0){
   ?> <div class="products">MERCI DE SÉLECTIONNER UNE QUANTITÉ !</div><?php
return;
}
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
        <div>
        <h3>Prix</h3>

        <p><br><br>Pour <?=$_REQUEST["nbOfArticle"] ." " .$_REQUEST["article"] ?> le cout total est de : <?=$total = ($_REQUEST["nbOfArticle"] * $_REQUEST["price"])." €"?> </p>
        <p>Vous bénéficiez exceptionnellement d'une remise de <?= ($remise =25) . "%"; ?></p>
        <p class="finalPrice">Prix après reduction : <?= $totalDiscounted = displayDiscountedPrice(intval($total), $remise)." €";?></p>
        <p class="htPrice">Prix HT : <?= priceExcludingVAT(intval($totalDiscounted)). " €" ?></p>
        </div>
        <form method="post" action="cart.php" id="transporterChoice">
        <div class="shipment">

        <label for="shipment-choice">Choisissez votre transporteur :</label>
            <select name="transp" id="transpChoice">
                <option value ="la poste">La Poste</option>
                <option value="DHL">DHL</option>
            </select>

        </div>
        <div class="shipmentCost">
            <p>Les frais de port sont de : </p>

        </div>
        </form>
    </div>
</div>
</div>
