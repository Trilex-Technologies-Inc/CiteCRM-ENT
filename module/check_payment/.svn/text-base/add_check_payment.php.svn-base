<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_check_payment.php<br>
	* Purpose:  Add New Check Payment<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/check_payment.class.php');
$check_payment = new check_payment();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new check_payment
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$check_payment_id = $check_payment->add_check_payment($_REQUEST);
			$core->force_page("index.php?page=check_payment:view_check_payment&check_payment_id=".$check_payment_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('check_payment/add_check_payment_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_check_payment_frm');
	$smarty->display('check_payment/add_check_payment_frm.tpl');
}
?>