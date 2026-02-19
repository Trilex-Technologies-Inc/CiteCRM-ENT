<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_state} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_state<br>
 * Purpose:  Prints the dropdowns for state selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_load_calendar_link($params, &$smarty) {
	
//window.location='/index.php'

	switch($params['eventType']){
		case "workorder":
			$link =  "window.location='/index.php?page=workorder:view_workorder&workorder_id=".$params['eventId']."'";
		break;

	}

	return $link;
}
?>