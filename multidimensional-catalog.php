<?php
session_start();

include "database.php";
include "head.php";
include "my-functions.php";
include "catalog.php";
include "class.php";
?>
<div style="margin-top: 200px">
    <?php



    $test = new Catalog($mysqlConnection);
    displayCatalog($test);



?>
</div>






