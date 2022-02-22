<?php

function formatPrice($centPrice)
{
    $euroPrice = $centPrice / 100;
    return $euroPrice . " €";
}


function priceExcludingVAT($TTCPrice)
{
    $HTPrice = (100 * $TTCPrice) / (100 + 20);
    return $HTPrice;
}

function displayDiscountedPrice($price, $discountPercent = 0)
{
    $discountedPrice = $price - ($price * ($discountPercent / 100));
    if ($discountPercent > 0) {
        return $price;
    }
    return $discountedPrice;
}

function formatWeight($weightToFormat)
{
    if ($weightToFormat >= 1000) {
        return $weightToFormat / 1000 . "kg";
    }
    return $weightToFormat . "g";
}

function displayItem(Item $product)
{
    ?>
    <div class="displayProducts">
        <form method="post" action="multidimensional-catalog.php">
            <p><?= $product->name ?></p>
            <p><?= $product->price ?></p>
            <img src="<?= $product->imageURL ?>">
            <input type="hidden" value="<?= $product->id ?>">
            <input type="number" value="quantity">
            <input type="submit" value="Ajouter au panier">
        </form>


    </div>
    <?php


}

function displayCatalog(Catalog $item)
{
    ?>
    <div class="pooList">
        <?php
        foreach ($item as $products) {
            foreach ($products as $value) {
                $product = new Item();
                $product->name = $value["name"];
                $product->price = $value["price"];
                $product->id = $value["id"];
                $product->imageURL = $value["image"];
                displayItem($product);
            }
        }
        ?>
    </div>
    <?php
}

function displayClient(Client $client)
{
    ?>
    <div class="displayProducts">
            <p><?= $client->getFirstName() ?></p>
            <p><?= $client->getLastName() ?></p>
            <p><?= $client->getAdress() ?></p>
            <p><?= $client->getZipCode() ?></p>
    </div>
    <?php


}

function displayList(ClientList $client)
{

    ?>
    <div class="pooList">
        <?php
        foreach ($client->getList() as $customer) {



                $vip = new Client();
                $vip->setFirstName($customer["first_name"]) ;
                $vip->setLastName($customer["last_name"]) ;
                $vip->setAdress($customer["adress"]) ;
                $vip->setZipCode($customer["zip_code"]);

                displayClient($vip);

        }
        ?>
    </div>
    <?php
}