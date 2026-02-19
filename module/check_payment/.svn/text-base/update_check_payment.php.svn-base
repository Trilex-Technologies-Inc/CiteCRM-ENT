<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_check_payment.php<br>
	* Purpose:  Update a Single Check Payment row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/check_payment.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new check_payment
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$check_payment = new check_payment();
			$check_payment->update_check_payment($_REQUEST);
			$core->force_page("index.php?page=check_payment:view_check_payment&check_payment_id=".$_REQUEST['check_payment_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('check_payment/update_check_payment_frm.tpl');
		}
} else {
	// Display the Form

$check_payment = new check_payment();
$check_payment->view_check_payment($_REQUEST['check_payment_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_check_payment_frm');

$smarty->assign('check_payment',$check_payment);
$smarty->display('check_payment/update_check_payment_frm.tpl');
}
?>