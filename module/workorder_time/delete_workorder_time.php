<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_workorder_time.php<br>
	* Purpose:  delete a Single Workorder Time row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_time.class.php');

	$core->verifyAdmin();

$workorder_time = new workorder_time();

$workorder_time->delete_workorder_time($_REQUEST['workorder_time_id']);

$smarty->display('workorder_time/delete_workorder_time.tpl')

?>