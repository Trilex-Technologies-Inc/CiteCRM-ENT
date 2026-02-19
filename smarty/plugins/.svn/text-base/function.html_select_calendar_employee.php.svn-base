<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_employee} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_employee<br>
 * Purpose:  Prints the dropdowns for Employee selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_calendar_employee($params, &$smarty) {

	require_once(CLASS_PATH."/core/user.class.php");
	
	$user = new user();
	
	$user_array = $user->load_by_type_id(EMPLOYEE_TYPE_ID);
	
	
	if($params['fieldName'] == "") {
		$params['fieldName'] ="user_id";
	}
	
	$html = "<select name=\"".$params['fieldName']."\" id=\"".$params['fieldName']."\">\n";
	
	$html .= "	<option \"0\">Company Event</option>\n";
	
	foreach($user_array as $key => $val) {
	
		$html .= "<option value=\"" . $val->getUserID() . "\" ";
		
		// Setup Slected
		if($val->getUserID() == $params['value']) {
			$html .= " selected ";
		} 
	
		$html .= ">" . $val->getUserFirstName() . " " . $val->getUserLastName() . "</option>\n";
	
	}

	$html .= "</select>\n";
	
	return $html;

}