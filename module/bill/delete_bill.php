<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_bill.php<br>
	* Purpose:  delete a Single Bills row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/bill.class.php');

	$core->verifyAdmin();

$bill = new bill();

$bill->delete_bill($_REQUEST['bill_id']);

$smarty->display('bill/delete_bill.tpl')

?>