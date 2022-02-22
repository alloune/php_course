<?php

include "database.php";
include "head.php";
include "my-functions.php";
include "class.php";
?>
    <div style="margin-top: 200px">
<?php
$vipList = new ClientList($mysqlConnection);
//var_dump($vipList);
displayList($vipList);
?>
    </div>
<?php

