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
 * Name:     system_model_name<br>
 * Purpose:  convert operating_system_manufacture_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_operating_system_name($string) {

	require_once(CLASS_PATH."/core/operating_system.class.php");
	
	$operating_system = new operating_system();
	
	$operating_system->view_operating_system($string);
	
	$string = $operating_system->get_operating_system_name();
	
	if(empty($string)) {
		$string = "N/A";
	}
	
	return $string;

}
?>