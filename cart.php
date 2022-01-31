<div style="margin-top: 200px"></div>
<?php
echo "<pre>";
include "head.php";
include "my-functions.php";
include "catalog.php";
global $products;
foreach ($_POST as $key =>$value) {
     foreach ($value as $key =>$valid) {
         var_dump($value[$key]["checkbox"]);
         var_dump($valid["quantity"]);
         if (isset($value[$key]["checkbox"]) && $valid["quantity"] < 0) {
            echo "bravo t'as bien un article avec une quantité valide";
        }
         else{
             ?>
             <div class="products">MERCI DE SÉLECTIONNER UNE QUANTITÉ VALIDE !</div>
             <?php
             return;
         }
    }

}




$la_poste = array("500g" => 500, "2kg" => 0.1, "moreThan2" => 0);
$DHL = array("500g" => 250, "5kg" => 0.15, "moreThan10" => 500);
//foreach($_REQUEST as $param){
//    foreach ($param as $key =>$test){
//        var_dump($key);
//        echo "<br>-------------------------------------<br>";
//        var_dump($param[$key]);
//        echo "<br>-------------------------------------<br>";
//        var_dump($param[$key]["quantity"]);
//        echo "<br>-------------------------------------<br>";
//    }
//}
$prices= $products[$_POST["article"]]["price"];
$weight= $products[$_POST["article"]]["weight"];
echo "</pre>";
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
                    <td><?= $_POST["article"] ?></td>
                    <td><?= $_POST["nbOfArticle"] ?></td>
                    <td><?= formatPrice($prices) ?></td>
                </tr>
                </tbody>

            </table>
        </div>
        <div class="price">
            <div>
                <h3>Prix</h3>

                <p><br><br>Pour <?= $_POST["nbOfArticle"] . " " . $_POST["article"] ?> le cout total est de
                    : <?= formatPrice($total = ($_POST["nbOfArticle"] * $prices)) ?> </p>
                <p>Vous bénéficiez exceptionnellement d'une remise de <?= ($remise = 25) . "%"; ?></p>
                <p class="finalPrice">Prix après reduction
                    : <?= formatPrice($totalDiscounted = displayDiscountedPrice(intval($total), $remise)); ?></p>
                <p class="htPrice">Prix HT : <?= formatPrice(priceExcludingVAT(intval($totalDiscounted))) ?></p>
            </div>
            <form class="shipmentMethod" method="post" action="cart.php">
                <div class="shipment">

                    <label for="shipment-choice">Choisissez votre transporteur :</label>
                    <select name="transp">
                        <option value="la_poste">La Poste</option>
                        <?php
                        echo '<option value="DHL"' . ($_REQUEST["transp"] == "DHL" ? "selected" : "") . '>DHL</option>';
                        ?>

                    </select>

                </div>
                <div class="shipmentCost">

                    <?php $totalWeight = ($weight * $_POST["nbOfArticle"]) ?>
                    <p>Le poids du colis est de : <?= formatWeight($totalWeight) ?> </p>
                    <input type="submit" value="Confirmer">

                    <input type="hidden" value="<?= $totalWeight ?>" name="weight">
                    <input type="hidden" value="<?= $_POST["nbOfArticle"] ?>" name="nbOfArticle">
                    <input type="hidden" value="<?= $_POST["article"] ?>" name="article">
                    <?php

                    $shipmentcost = 0;
                    if ($totalWeight > 2000) {
                        $shipmentcost = $la_poste["moreThan2"];
                    } elseif ($totalWeight > 500 && $totalWeight < 2000) {
                        $shipmentcost = $totalDiscounted * $la_poste["2kg"];
                    } elseif ($totalWeight < 500) {
                        $shipmentcost = $shipmentcost + $la_poste["500g"];
                    }

                    if (isset($_POST["transp"]) && $_POST["transp"] == "DHL") {
                        if ($totalWeight > 10000) {
                            $shipmentcost = $DHL["moreThan10"];
                        } elseif ($totalWeight > 500 && $totalWeight < 10000) {
                            $shipmentcost = $totalDiscounted * $DHL["5kg"];
                        } elseif ($totalWeight < 500) {
                            $shipmentcost = $shipmentcost + $DHL["500g"];
                        }

                    }

                    ?>
                    <p>Les frais de port sont de : <?= formatPrice($shipmentcost) ?>  </p>


                </div>
            </form>
        </div>
    </div>
</div>
