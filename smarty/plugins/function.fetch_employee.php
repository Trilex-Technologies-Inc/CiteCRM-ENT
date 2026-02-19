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
function smarty_function_fetch_employee($params, &$smarty) {

	require_once(CLASS_PATH."/core/user.class.php");
	
	$user = new user();
	
	$user_array = $user->load_by_type_id(EMPLOYEE_TYPE_ID);
	
	$smarty->assign($params['assign'],$user_array);

}
	