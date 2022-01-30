<?php
include "head.php";
include "my-functions.php";
include "catalog.php";
global $products;
if(empty($_REQUEST["nbOfArticle"]) || $_REQUEST["nbOfArticle"]<0){
   ?> <div class="products">MERCI DE SÉLECTIONNER UNE QUANTITÉ VALIDE !</div><?php
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
                    <th colspan="3">Récapitulatif des produits sélectionnés</th>

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
                <td><?= formatPrice($products[$_REQUEST["article"]]["price"])?></td>
            </tr>
            </tbody>

        </table>
    </div>
    <div class="price">
        <div>
        <h3>Prix</h3>

        <p><br><br>Pour <?=$_REQUEST["nbOfArticle"] ." " .$_REQUEST["article"] ?> le cout total est de : <?=formatPrice($total = ($_REQUEST["nbOfArticle"] * $products[$_REQUEST["article"]]["price"]))?> </p>
        <p>Vous bénéficiez exceptionnellement d'une remise de <?= ($remise =25) . "%"; ?></p>
        <p class="finalPrice">Prix après reduction : <?= formatPrice($totalDiscounted = displayDiscountedPrice(intval($total), $remise));?></p>
        <p class="htPrice">Prix HT : <?= formatPrice(priceExcludingVAT(intval($totalDiscounted))) ?></p>
        </div>
        <form class ="shipmentMethod" method="post" action="cart.php" id="transporterChoice">
        <div class="shipment">

        <label for="shipment-choice">Choisissez votre transporteur :</label>
            <select name="transp" id="transpChoice">
                <option value ="la poste">La Poste</option>
                <option value="DHL">DHL</option>
            </select>

        </div>
        <div class="shipmentCost">

            <?php $totalWeight = ($products[$_REQUEST["article"]]["weight"] * $_REQUEST["nbOfArticle"])?>
            <p>Le poids du colis est de : <?= formatWeight($totalWeight)?> </p>
            <input type="submit" value="Confirmer">
            <p>Les frais de port sont de : </p>


        </div>
        </form>
    </div>
</div>
</div>
