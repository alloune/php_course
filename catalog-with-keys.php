<?php

include "head.php";
include "my-functions.php";

?>
<div style="height: 800px; position: relative; top: 200px">
<?php
    $iPhone= [
        "name"=>"iPhone",
        "price"=> 45000,
        "weight"=> 200,
        "discount"=>10,
        "picture_url"=>"https://www.apple.com/v/iphone-13-pro/a/images/overview/design/finishes_1_sierra_blue__2bovafkl4yaa_large.jpg"
    ];
    $iMac= [
        "name"=>"iMac",
        "price"=> 144900,
        "weight"=> 8920,
        "discount"=>0,
        "picture_url"=>"https://www.apple.com/v/imac-27/c/images/overview/display_retina__b6ivivqnixhy_large.jpg"
        ];

    $iPad   = [
        "name"=>"iPad",
        "price"=> 55900,
        "weight"=> 458,
        "discount"=>10,
        "picture_url"=>"https://www.apple.com/fr/ipad-10.2/images/overview/hero/hero__bko3fc2it2s2_large.jpg"
    ];

    echo "<br> Prix iPhone : ".formatPrice($iPhone["price"]);
    echo "<br> Prix iPhone <strong>HT</strong> : ".priceExcludingVAT($iPhone["price"]);
    echo "<br>".displayDiscountedPrice($iPhone["price"],0);

    echo "<br>----------------------------------------------";
    echo "<br> Prix iPad : ".formatPrice($iPad["price"]);
    echo "<br> Prix iPad <strong>HT</strong> : ".priceExcludingVAT($iPad["price"]);
    echo "<br>".displayDiscountedPrice($iPad["price"],70);

    echo "<br>----------------------------------------------";
    echo "<br> Prix iMac : ".formatPrice($iMac["price"]);
    echo "<br> Prix iMac <strong>HT</strong> : ".priceExcludingVAT($iMac["price"]);
    echo "<br>".displayDiscountedPrice($iMac["price"],27.2);

    echo "<br>----------------------------------------------";
//print_r($iPhone);
//echo "<br>".implode("<br>", $iPhone);
//echo "<br>--------------------------------------------<br>";
//echo implode("<br>", $iPad);
//echo "<br>--------------------------------------------<br>";
//echo implode("<br>", $iMac);

///***********VALIDATION BOUCLE **********/////
///
echo "<br>VALIDATION BOUCLE, Affichage du tableau \$iPhone";
foreach ($iPhone as $value){
    echo "<br>".$value."<br>";
}

?>
</div>

<?php

include "footer.php";