<?php

function formatPrice($centPrice){

    $euroPrice = $centPrice/100;

    return $euroPrice." €";
}


function priceExcludingVAT($TTCPrice){

    $HTPrice = (100*$TTCPrice)/(100+20);
    $HTPriceEuro = formatPrice($HTPrice);
    return $HTPriceEuro;
}

function displayDiscountedPrice($price, $discountPercent = 0){

    $discountedPrice = $price -($price * ($discountPercent/100));
    $discountedPrice = formatPrice($discountedPrice);
    $price = formatPrice($price);
    if($discountPercent>0){
    return $discountedPrice."   <strike>".$price."</strike>". "   <bold> Remise de :</bold>   ".$discountPercent."% !!!";}
    else{
        return $discountedPrice . "  Ce produit n'est pas remisé";
    }
}