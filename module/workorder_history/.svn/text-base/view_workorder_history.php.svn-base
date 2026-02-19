<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_workorder_history.php<br>
	* Purpose:  View a Single Work Order History row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_history.class.php');

	$core->verifyAdmin();
	$workorder_history = new workorder_history();

$workorder_history->view_workorder_history($_REQUEST['workorder_history_id']);

$smarty->assign('workorder_history', $workorder_history);

$smarty->display('workorder_history/view_workorder_history.tpl');

?>