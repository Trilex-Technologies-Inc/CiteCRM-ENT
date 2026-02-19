<?php

require_once(CLASS_PATH."/core/product.class.php");

$productObj = new product();

$product_id = $_GET['product_id'];

$productObj->view_product($product_id);

$smarty->assign('productObj', $productObj);

$smarty->display('product/ajax_load_specifications.tpl');
?>