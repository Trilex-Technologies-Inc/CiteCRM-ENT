<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_workorder_status} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_workorder_status<br>
 * Purpose:  Prints the dropdowns for Work Order Status selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_workorder_status($params, &$smarty) {

	require_once(CLASS_PATH."/core/workorder_status.class.php");
	
	$workorder_status = new workorder_status();
	
	$workorder_status_array = $workorder_status->load_all();
	
	if($params['fieldName'] == "") {
		$params['fieldName'] ="workorder_status";
	}
	
	
	$html = "<select name=\"".$params['fieldName']."\" id=\"".$params['fieldName']."\">\n";
	
	$html .= "	<option \"0\">Select One</option>\n";
	
	foreach($workorder_status_array as $key => $val) {
	
		$html .= "<option value=\"" . $val->get_workorder_status_id() . "\" ";
		
		// Setup Slected
		if($val->get_workorder_status_id() == $params['value']) {
			$html .= " selected ";
		} 
	
		$html .= ">" . $val->get_workorder_status_text() . "</option>\n";
	
	}

	$html .= "</select>\n";
	
	return $html;

}