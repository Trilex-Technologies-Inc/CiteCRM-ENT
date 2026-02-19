<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_user_to_workorder.php<br>
	* Purpose:  delete a Single User To Work Order row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/user_to_workorder.class.php');

	$core->verifyAdmin();

$user_to_workorder = new user_to_workorder();

$user_to_workorder->delete_user_to_workorder($_REQUEST['user_to_workorder_id']);

$smarty->display('user_to_workorder/delete_user_to_workorder.tpl')

?>