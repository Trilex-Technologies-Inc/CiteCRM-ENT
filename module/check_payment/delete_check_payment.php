<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_check_payment.php<br>
	* Purpose:  delete a Single Check Payment row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/check_payment.class.php');

	$core->verifyAdmin();

$check_payment = new check_payment();

$check_payment->delete_check_payment($_REQUEST['check_payment_id']);

$smarty->display('check_payment/delete_check_payment.tpl')

?>