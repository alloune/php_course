<?php session_start();?>
<div style="margin-top: 200px"></div>
<?php

var_dump($_SESSION);
include "head.php";
include "my-functions.php";
include "catalog.php";
global $products;
foreach ($_POST['giveInf'] as $key => $value) {
    foreach ($value as $test => $valid) {
        if (isset($_POST["giveInf"][$key]["checkbox"]) && $valid <= 0) {
            ?>
            <div class="products">MERCI DE SÉLECTIONNER UNE QUANTITÉ VALIDE !</div>
            <?php
            return;
        }

    }

}

$la_poste = array("500g" => 500, "2kg" => 0.1, "moreThan2" => 0);
$DHL = array("500g" => 250, "5kg" => 0.15, "moreThan10" => 500);
$totalWeight = $totalCost = 0;


?>

<div class="panier">
    <h2>PANIER</h2>
    <h3>Bonjour <?=$_SESSION["name"]?></h3>
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
                <form class="shipmentMethod" method="post" action="cart.php">
                    <?php
                    /*    echo "<pre>";
                        var_dump($_POST['giveInf']);
                        echo "</pre>";
                        die;*/
                    foreach ($_POST['giveInf'] as $key => $data) {

                        /*foreach ($data as $key => $value) {*/

                        if (isset($data['checkbox']) && $data['quantity'] > 0) {

                            ?>
                            <input type="hidden" name="giveInf[<?= $key ?>][checkbox]" value="1">
                            <input type="hidden" name="giveInf[<?= $key ?>][quantity]"
                                   value="<?= $data['quantity'] ?> ">
                            <tr>
                            <td><?= $key ?></td>
                            <td><?= $data['quantity'] ?></td>
                            <td><?= formatPrice($products[$key]["price"]) ?></td>
                            </tr><?php

                            $totalCost = $totalCost + $data['quantity'] * $products[$key]["price"];
                            $totalWeight = $totalWeight + $data['quantity'] * $products[$key]["weight"];
                        }

                        /* }*/

                    }
                    ?>
                </tbody>

            </table>
        </div>
        <div class="price">
            <div>
                <h3>Prix</h3>

                <p><br><br>Le cout total est de : <?= formatPrice($totalCost) ?> </p>
                <p>Vous bénéficiez exceptionnellement d'une remise de <?= ($remise = 25) . "%"; ?></p>
                <p class="finalPrice">Prix après reduction
                    : <?= formatPrice($totalDiscounted = displayDiscountedPrice(intval($totalCost), $remise)); ?></p>
                <p class="htPrice">Prix HT : <?= formatPrice(priceExcludingVAT(intval($totalDiscounted))) ?></p>
            </div>

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


                <p>Le poids du colis est de : <?= formatWeight($totalWeight) ?> </p>
                <input type="submit" value="Confirmer">

                <input type="hidden" value="<?= $totalWeight ?>" name="weight">
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
