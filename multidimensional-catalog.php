<?php

include "head.php";
include "my-functions.php";

?>
    <div style="height: 1000px; position: relative; top: 200px">
        <?php
    $products = [
            "iPhone"=>[
                "name"=>"iPhone",
                "price"=> 45000,
                "weight"=> 200,
                "discount"=>10,
                "picture_url"=>"https://www.apple.com/v/iphone-13-pro/a/images/overview/design/finishes_1_sierra_blue__2bovafkl4yaa_large.jpg"
            ],
            "iPad"=>[
                "name"=>"iPad",
                "price"=> 55900,
                "weight"=> 458,
                "discount"=>10,
                "picture_url"=>"https://www.apple.com/fr/ipad-10.2/images/overview/hero/hero__bko3fc2it2s2_large.jpg"
            ],

            "iMac"=>[
                "name"=>"iMac",
                "price"=> 144900,
                "weight"=> 8920,
                "discount"=>0,
                "picture_url"=>"https://www.apple.com/v/imac-27/c/images/overview/display_retina__b6ivivqnixhy_large.jpg"
            ]
    ];
//echo "<p>Voici le var dump des \$Products</p>";
//var_dump($products);
//echo"<br/><pre>";
//print_r($products);
//echo"</pre>";
echo "Prix de l'iPhone :".formatPrice($products["iPhone"]["price"]);
echo "<br>Prix de l'iPhone HT :".priceExcludingVAT($products["iPhone"]["price"]);
echo "<br>Prix remisé :".displayDiscountedPrice($products["iPhone"]["price"],10);
echo "<br>----------------------------------------------";
echo "<br>Prix de l'iPad :".formatPrice($products["iPad"]["price"]);
echo "<br>Prix de l'iPad HT :".priceExcludingVAT($products["iPad"]["price"]);
echo "<br>Prix remisé :".displayDiscountedPrice($products["iPad"]["price"],0);
echo "<br>----------------------------------------------";
echo "<br>Prix de l'iMac :".formatPrice($products["iMac"]["price"]);
echo "<br>Prix de l'iMac HT:".priceExcludingVAT($products["iMac"]["price"]);
echo "<br>Prix remisé :".displayDiscountedPrice($products["iMac"]["price"], 33);
echo "<br>----------------------------------------------";



foreach($products as $carac =>$result){

    echo "<br>";

    foreach($result as $merc =>$value ){
        if($merc === "picture_url"){
            echo "<img class=\"photo_article\" src =".$value.">";

        }
        else {
            echo "<br>" . $value;
        }

    }

}
        ?>
    </div>

<?php

include "footer.php";