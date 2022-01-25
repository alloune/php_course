<?php

include "head.php";
$products = ["iPhone", "iPad", "iMax"];

?>

    <div style="height: 500px; position: relative; top: 200px">
<?php
//    print_r($product);
sort($products);
print_r($products);
//    print_r($product);
for ($i = 0; $i < count($products); $i++)
{
    echo "<br>".$products[$i];
}

//foreach ($product as $item)
//{
//    echo "<br>".$item;
//}
//for ($count = 0; $count < $products_length; $count++) {
//    echo "<br />", $products[$count], "<br />";
    ?>
    <!--<p> Le premier élement de la liste est --><?php //echo $product[0];
    ?><!--</p>-->
    <!--    <p> Le dernier élement de la liste est --><?php //echo $product[2];
    ?><!--</p>-->
    </div>


    <?php
    include "footer.php";

