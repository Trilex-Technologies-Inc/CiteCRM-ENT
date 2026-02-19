<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_cc_payment.php<br>
	* Purpose:  delete a Single Credit Card Payment row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/cc_payment.class.php');

	$core->verifyAdmin();

$cc_payment = new cc_payment();

$cc_payment->delete_cc_payment($_REQUEST['cc_payment_id']);

$smarty->display('cc_payment/delete_cc_payment.tpl')

?>