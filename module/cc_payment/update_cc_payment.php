<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_cc_payment.php<br>
	* Purpose:  Update a Single Credit Card Payment row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/cc_payment.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new cc_payment
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$cc_payment = new cc_payment();
			$cc_payment->update_cc_payment($_REQUEST);
			$core->force_page("index.php?page=cc_payment:view_cc_payment&cc_payment_id=".$_REQUEST['cc_payment_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('cc_payment/update_cc_payment_frm.tpl');
		}
} else {
	// Display the Form

$cc_payment = new cc_payment();
$cc_payment->view_cc_payment($_REQUEST['cc_payment_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_cc_payment_frm');

$smarty->assign('cc_payment',$cc_payment);
$smarty->display('cc_payment/update_cc_payment_frm.tpl');
}
?>