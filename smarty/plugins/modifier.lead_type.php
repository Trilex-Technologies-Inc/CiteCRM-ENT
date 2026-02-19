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
function smarty_modifier_lead_type($string) {

	require_once(CLASS_PATH."/core/lead_type.class.php");

	$leadTypeObj = new lead_type();

	$leadTypeObj->view_lead_type($string);

	$string = $leadTypeObj->get_lead_type_text();

	return $string;

}
?>