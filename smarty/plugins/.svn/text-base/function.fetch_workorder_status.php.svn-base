<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {fetch_workorder_status} function plugin
 *
 * Type:     function<br>
 * Name:     fetch_workorder_status<br>
 * Purpose:  Fetches workorder status and returns array
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_fetch_workorder_status($params, &$smarty) {

	require_once(CLASS_PATH."/core/workorder_status.class.php");
	
	$workorder_status = new workorder_status();
	
	$workorder_status_array = $workorder_status->load_all();
	
	$smarty->assign($params['assign'],$workorder_status_array);

}