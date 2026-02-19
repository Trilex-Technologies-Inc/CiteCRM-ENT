<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_company_users} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_company_users<br>
 * Purpose:  Prints the dropdowns for Company Users selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_company_users($params, &$smarty) {

	require_once(CLASS_PATH."/core/user.class.php");

	$user = new user();

	

	$user_array = $user->load_by_company_id($params['company_id'],$field='user_id',$sort='ASC',$start=0,$limit=0,&$total);
	
	$html .= "<select name=\"user_id\" id=\"user_id\">";
	 
	$html .= "<option value=\"\">Un-Assigned</option>\n";
	
	
	foreach($user_array as $user) {
	
		$html .= "<option value=\"" . $user->getUserID() . "\" ";
		
		// Setup Slected
		if($user->getUserID() == $params['value']) {
			$html .= " selected ";
		} 
		
		
		$html .= ">" . $user->getUserFirstName() . " " . $user->getUserLastName() . "</option>\n";
	
	
	}
	
	
	$html .= "</select>\n";
	
	return $html;
	

}