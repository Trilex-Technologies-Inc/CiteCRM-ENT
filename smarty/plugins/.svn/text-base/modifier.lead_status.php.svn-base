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
function smarty_modifier_lead_status($string) {
	require_once(CLASS_PATH."/core/lead_status.class.php");

	$leadStatusObj = new lead_status();

	$leadStatusObj->view_lead_status($string);

	$string = $leadStatusObj->get_lead_status_text();

	return $string;


}


?>