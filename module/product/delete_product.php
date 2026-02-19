<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_product.php<br>
	* Purpose:  delete a Single Products row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/product.class.php');

	$core->verifyAdmin();

$product = new product();

$product->delete_product($_REQUEST['product_id']);

$smarty->display('product/delete_product.tpl')

?>