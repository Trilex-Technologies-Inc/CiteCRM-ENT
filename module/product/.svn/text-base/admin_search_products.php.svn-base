<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_product.php<br>
 * Purpose:  Search Products<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH.'/core/product.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');


$product = new product();

$upcCode							= $_REQUEST['upcCode'];
$manufacture_id				= $_REQUEST['manufacture_id'];
$product_model					= $_REQUEST['product_model'];
$product_status				= $_REQUEST['product_status'];
$product_virtual				= $_REQUEST['product_virtual'];

// Paginate

if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("product");
}


SmartyPaginate::connect("product");

SmartyPaginate::setLimit(50,"product");

SmartyPaginate::setUrl("/?page=product:admin_search_products&upcCode=$upcCode&manufacture_id=$manufacture_id&product_model=$product_model&product_status=$product_status&product_virtual=$product_virtual","product");
	
$start	= SmartyPaginate::getCurrentIndex("product");

$limit	= SmartyPaginate::getLimit("product");

$productArray = $product->admin_search_product($upcCode,$manufacture_id,$product_model,$product_status,$product_virtual,$start,$limit,&$total);

$smarty->assign('productArray', $productArray);

SmartyPaginate::setTotal($total,"product");  

SmartyPaginate::assign($smarty,"paginate","product");

$smarty->display('product/search_product.tpl');

?>