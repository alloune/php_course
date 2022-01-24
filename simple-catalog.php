<?php

include  "head.php";
$product=["iPhone", "iPad", "iMax"];

?>

<div style ="height: 500px; position: relative; top: 200px">
    <?php
    print_r($product);
    echo("<br>");
    natsort($product);
    print_r($product);
    ?>
<p> Le premier élement de la liste est <?php echo $product[0]; ?></p>
    <p> Le dernier élement de la liste est <?php echo $product[2]; ?></p>
</div>


<?php
include "footer.php";

