<?php

function formatPrice($centPrice){

    $euroPrice = $centPrice/100;

    return $euroPrice;
}


function priceExcludingVAT($TTCPrice){

    $HTPrice = (100*$TTCPrice)/(100+20);
    return $HTPrice;
}

function displayDiscountedPrice($price, $discountPercent = 0){

    $discountedPrice = $price -($price * ($discountPercent/100));
    if($discountPercent>0){
    return $discountedPrice;}
    else{
        return $discountedPrice ;
    }
}