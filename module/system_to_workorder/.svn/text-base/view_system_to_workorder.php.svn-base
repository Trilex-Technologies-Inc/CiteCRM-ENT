<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_system_to_workorder.php<br>
	* Purpose:  View a Single System To Workorder row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/system_to_workorder.class.php');

	$core->verifyAdmin();
	$system_to_workorder = new system_to_workorder();

$system_to_workorder->view_system_to_workorder($_REQUEST['system_to_workorder_id']);

$smarty->assign('system_to_workorder', $system_to_workorder);

$smarty->display('system_to_workorder/view_system_to_workorder.tpl');

?>