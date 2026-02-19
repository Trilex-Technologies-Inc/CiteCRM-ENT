<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_user_to_workorder.php<br>
	* Purpose:  View a Single User To Work Order row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/user_to_workorder.class.php');

	$core->verifyAdmin();
	$user_to_workorder = new user_to_workorder();

$user_to_workorder->view_user_to_workorder($_REQUEST['user_to_workorder_id']);

$smarty->assign('user_to_workorder', $user_to_workorder);

$smarty->display('user_to_workorder/view_user_to_workorder.tpl');

?>