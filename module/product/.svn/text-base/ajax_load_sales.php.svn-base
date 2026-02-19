<?php
require(CLASS_PATH.'/core/product.class.php');

$productObj = new product();

$core->verifyAdmin(CAN_READ);

$product_id = $_GET['product_id'];

$total = 0;

$total_product_sold = 0;

$array = $productObj->load_product_sales($product_id);



foreach($array as $product) {
    $total = $product->fields['invoice_part_sub_total'] + $total;
    $total_product_sold = $product->fields['invoice_part_qty'] + $total_product_sold;
}


$smarty->assign('array',$array);


$smarty->assign('total',$total);

$smarty->assign('total_product_sold',$total_product_sold);


$smarty->display('product/ajax_load_sales.tpl');

/*
print "<pre>";
print_r($array);
print "</pre>";
*/
?>