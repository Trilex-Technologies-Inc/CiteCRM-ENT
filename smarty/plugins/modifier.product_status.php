<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   product_status modifier plugin
 *
 * Type:     modifier<br>
 * Name:     product_status<br>
 * Purpose:  convert product_status_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_product_status($string) {

	require_once(CLASS_PATH."/core/product_status.class.php");
	
	$product_status = new Product_Status();
	
	$product_status->view_product_status($string);
	
	$string = $product_status->get_product_status_text();
	
	if(empty($string)){
		$string = "N/A";
	}
	
	return $string;
	


}