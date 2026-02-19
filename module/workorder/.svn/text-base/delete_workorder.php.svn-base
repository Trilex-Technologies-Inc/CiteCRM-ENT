<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_workorder.php<br>
	* Purpose:  delete a Single Work Order row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(CAN_DELETE);

require(CLASS_PATH.'/core/workorder.class.php');

$workorder = new workorder();

$workorder->delete_workorder($_REQUEST['workorder_id']);

$smarty->display('workorder/delete_workorder.tpl')

?>