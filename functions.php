<?php
require('./database/DBController.php');
require('./database/Product.php');
require('./database/Cart.php');
//
$db =new DBController();
$product = new Product($db);
$product_shuffle = $product->getData();

// cart object

$Cart =new Cart($db);


?>