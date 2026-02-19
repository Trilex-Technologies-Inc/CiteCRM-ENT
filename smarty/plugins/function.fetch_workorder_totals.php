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
function smarty_function_fetch_workorder_totals($params, &$smarty) {

    require_once(CLASS_PATH."/core/workorder.class.php");

    $workorderObj = new workorder();

    $workorder_id = $params['workorder_id'];


    $workorder_labor = $workorderObj->sum_labor($workorder_id);

    $workorder_parts = $workorderObj->sum_parts($workorder_id);

	$workorder_service = $workorderObj->sum_service($workorder_id);


    $workorder_total = $workorder_labor + $workorder_parts + $workorder_service;


    $smarty->assign('workorder_labor',$workorder_labor);

    $smarty->assign('workorder_parts',$workorder_parts);
    
    $smarty->assign('workorder_service',$workorder_service);

    $smarty->assign('workorder_total',$workorder_total);

    $smarty->display('workorder/workorder_totals.tpl');

}
	