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
 * Name:     operating_system_manufacture_name<br>
 * Purpose:  convert operating_system_manufacture_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_operating_system_manufacture_name($string) {

	require_once(CLASS_PATH."/core/operating_system_manufacture.class.php");
	
	$operating_system_manufacture = new operating_system_manufacture();
	
	$operating_system_manufacture->view_operating_system_manufacture($string);
	
	$string = $operating_system_manufacture->get_operating_system_manufacture_name();
	
	return $string;


}