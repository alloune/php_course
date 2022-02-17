<?php session_start();
?>

<div style="margin-top: 200px"></div>
<?php
include "head.php";
include "my-functions.php";
include "catalog.php";
include "database.php";
$total = 0;

//echo count($_POST);
if (count($_POST) > 0 && isset($_POST['product_id'])) {

    $deleteProduct = $mysqlConnection->query("DELETE FROM order_product WHERE product_id = $_POST[product_id] AND order_id = $_POST[order_id]");

}

?>

<h2>Mon Panier</h2>

<div class="finalCart">
    <div class="resume">
        <ul class="cartList">
            <?php
            $collectAllProducts = $mysqlConnection->query("
SELECT order_product.quantity, name,image, order_id, product_id, SUM(price * order_product.quantity) AS total_order
FROM order_product
JOIN products ON products.id = product_id
JOIN orders ON orders.id=order_id
WHERE order_id=8
GROUP BY name; 
");

            $useQuery = $collectAllProducts->fetchAll();
            //            echo "<pre>";
            //            echo count($useQuery);
            //            echo "</pre>";
            if (count($useQuery) == 0) {
                ?>
                <h3>VOTRE PANIER EST VIDE</h3>
                <?php
                die;
            }
            foreach ($useQuery as $value) {
                ?>
                <form method="post" action="cart.php">
                    <li>
                        <p><?= $value['name'] ?></p>
                        <img src="<?= $value['image'] ?>">
                        <p>x <?= $value['quantity'] ?></p>
                        <p><?= $value['total_order'] ?> €</p>
                        <input type="hidden" name="product_id" value="<?= $value['product_id'] ?>">
                        <input type="hidden" name="order_id" value="<?= $value['order_id'] ?>">
                        <input type="submit" value="Supprimer du panier">

                    </li>
                </form>
                <?php
                $total += $value["total_order"];
            }
            ?>
        </ul>
        <div class="total">
            <h2>Total : <?= $total ?> €</h2>

        </div>
    </div>

    <div class="carrier">
        <?php
        //Connexion -> get total weight
//        SELECT SUM(order_product.quantity * weight) AS total_weight
//FROM order_product
//JOIN products ON products.id = product_id
//WHERE order_id = 8; <-- la on va plutot donnéer l'id de l'order en cours du customer une fois mise en place

$weightCalc = $mysqlConnection->query("SELECT SUM(order_product.quantity * weight) AS total_weight
FROM order_product
JOIN products ON products.id = product_id
WHERE order_id = 8");
$totalWeight = $weightCalc->fetchAll();
//echo "<pre>";
//var_dump($totalWeight);
//echo "</pre>";



        ?>
        <h2>Commande</h2>
        <p>Poids total : <?= formatWeight($totalWeight[0]["total_weight"]) ?></p>
        <form method="post" action="cart.php">
        <label for="carrier-select">Selectionner un transporteur :</label>
        <select name="carrier">
            <option value=""></option>
            <option value="la_poste">La Poste</option>
            <option value="dhl">DHL</option>
            <option value="colissimo">Colissimo</option>
            <option value="fedex">FedEx</option>

        </select>
        <input type="submit" value="Valider">
        </form>
        <p>Prix FPI</p>
    </div>
</div>