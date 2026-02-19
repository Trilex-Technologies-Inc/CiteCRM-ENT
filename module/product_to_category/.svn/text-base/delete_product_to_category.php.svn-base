<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_product_to_category.php<br>
	* Purpose:  delete a Single Product To Category row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/product_to_category.class.php');

	$core->verifyAdmin();

$product_to_category = new product_to_category();

$product_to_category->delete_product_to_category($_REQUEST['product_to_category_id']);

$smarty->display('product_to_category/delete_product_to_category.tpl')

?>