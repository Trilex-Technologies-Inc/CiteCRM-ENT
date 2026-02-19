<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   workorder_status modifier plugin
 *
 * Type:     modifier<br>
 * Name:     product_manufacture_name<br>
 * Purpose:  convert product_manufacture_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_product_manufacture_name($string) {

	require_once(CLASS_PATH . "/core/manufacture.class.php");
	
	$manufactureObj = new manufacture();
	
	$manufactureObj->view_manufacture($string);

	$string = $manufactureObj->get_manufacture_name();

	if(empty($string)) {
		$string = "N/A";
	}

	return $string;

}