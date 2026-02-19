<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_bill.php<br>
	* Purpose:  View a Single Bills row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/bill.class.php');

	$core->verifyAdmin();
	$bill = new bill();

$bill->view_bill($_REQUEST['bill_id']);

$smarty->assign('bill', $bill);

$smarty->display('bill/view_bill.tpl');

?>