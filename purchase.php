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

    public function displayItem()
    {

        ?>
        <div>
            <p><?= $this->name ?></p>
            <p><?= $this->price ?></p>
            <img src="<?= $this->imageURL ?>">

        </div>
        <?php

    }

}
?>
<div style="margin-top: 200px;">

</div>
<?php
$test = new Item();
$test->name="pomme";
$test->price=12;
$test->displayItem();
var_dump($test);
var_dump($listOfThings);
class Catalogue{

    public array $answerRQST;

    public function __construct(){



    }


}

$catalogue = new Catalogue();
$catalogue->answerRQST = $listOfThings;

var_dump($catalogue);


