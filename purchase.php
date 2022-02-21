<?php
session_start();

include "database.php";
include "head.php";
include "my-functions.php";
include "catalog.php";
$listOfThings = getAllProduct();


class Item
{
    public string $name;
    public string $description;
    public int $price;
    public string $imageURL;
    public int $weight;
    public int $stock;
    public bool $available;
    public int $quantity;
    public int $category;

}



//var_dump($listOfThings);

function displayItem(Item $product)
{

    ?>
    <div class="productsList">
        <p><?= $product->name ?></p>
        <p><?= $product->price ."€" ?></p>
        <img src="<?= $product->imageURL ?>">

    </div>
<?php

}

?>
<div>


    <?php

    foreach ($listOfThings as $product){
        $test = new Item();
        $test->name=$product["name"];
        $test->price=$product["price"];
        $test->imageURL=$product["image"];
        displayItem($test);
    }


    ?>
</div>


