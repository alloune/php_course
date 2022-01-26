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