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
function smarty_modifier_system_model_name($string) {

	require_once(CLASS_PATH."/core/system_model.class.php");
	
	$system_model = new system_model();
	
	$system_model->view_system_model($string);
	
	$string = $system_model->get_system_model_name();
	
	if(empty($string)) {
		$string = "N/A";
	}
	
	return $string;


}