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
function smarty_modifier_contract_type($string) {

	require_once(CLASS_PATH."/core/contract_type.class.php");
	
	$contract_typeObj = new contract_type();
	
	$contract_typeObj->view_contract_type($string);
	
	$string = $contract_typeObj->get_contract_type_name();
	
	if(empty($string)) {
		$string = "N/A";
	}
	
	return $string;

}
?>