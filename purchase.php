<?php
session_start();

include "database.php";
include "head.php";
include "my-functions.php";
include "catalog.php";
include "class.php";

?>
<div class="test">

    <ul class="pooList">
        <?php
        $catalogue = new Catalogue($mysqlConnection);
        echo displayCataloque($catalogue);


        ?>
    </ul>
</div>


