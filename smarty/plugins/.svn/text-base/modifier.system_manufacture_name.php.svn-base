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
 * Name:     system_manufacture_name<br>
 * Purpose:  convert system_manufacture_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_system_manufacture_name($string) {

	require_once(CLASS_PATH."/core/system_manufacture.class.php");
	
	$system_manufacture = new system_manufacture();
	
	$system_manufacture->view_system_manufacture($string);
	
	$string = $system_manufacture->get_manufacture_name();
	
	if(empty($string)) {
		$string = "N/A";
	}
	
	return $string;


}