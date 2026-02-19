<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_cc_payment.php<br>
	* Purpose:  Add New Credit Card Payment<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/cc_payment.class.php');
$cc_payment = new cc_payment();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new cc_payment
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$cc_payment_id = $cc_payment->add_cc_payment($_REQUEST);
			$core->force_page("index.php?page=cc_payment:view_cc_payment&cc_payment_id=".$cc_payment_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('cc_payment/add_cc_payment_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_cc_payment_frm');
	$smarty->display('cc_payment/add_cc_payment_frm.tpl');
}
?>