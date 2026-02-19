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
 * Name:     workorder_status<br>
 * Purpose:  convert Workorer Status ID to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_workorder_status($string) {

	require_once(CLASS_PATH."/core/workorder_status.class.php");
	
	$workorder_status = new workorder_status;
	
	$workorder_status_array = $workorder_status->load_all();
	

	
	foreach($workorder_status_array as $key => $val) {
	
		if( $string == $val->get_workorder_status_id() ) {	
			
			$string = $val->get_workorder_status_text();	
				
		}
	
	}
	
	
    return($string);
}

?>