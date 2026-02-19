<?php

require(CLASS_PATH.'/core/product.class.php');

$productObj = new product();

$core->verifyAdmin(CAN_READ);

$product_id = $_GET['product_id'];


$productObj->load_product_manufacture($product_id);

$smarty->assign('productObj',$productObj);


$smarty->display('product/ajax_load_manufacture.tpl');
?>