<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_project_status} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_project_status<br>
 * Purpose:  Prints the dropdowns for project status selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_fetch_project_status($params, &$smarty) {

	require_once(CLASS_PATH."/core/project_status.class.php");
	
	$project_status = new project_status();
	
	$project_status_array = $project_status->load_in_array();
	
	$smarty->assign($params['assign'],$project_status_array);

}