<?php
include "database.php";
echo "<pre>";
var_dump($_POST);
echo "<pre>";



$mysqlConnection -> query("DELETE FROM products WHERE id='$_POST[id]'");

echo "element supprimé !";