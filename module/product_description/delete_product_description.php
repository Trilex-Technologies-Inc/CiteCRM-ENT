<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_product_description.php<br>
	* Purpose:  delete a Single Product Description row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/product_description.class.php');

	$core->verifyAdmin();

$product_description = new product_description();

$product_description->delete_product_description($_REQUEST['product_description_id']);

$smarty->display('product_description/delete_product_description.tpl')

?>