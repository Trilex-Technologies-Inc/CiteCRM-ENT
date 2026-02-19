<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_bill.php<br>
	* Purpose:  Update a Single Bills row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/bill.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new bill
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$bill = new bill();
			$bill->update_bill($_REQUEST);
			$core->force_page("index.php?page=bill:view_bill&bill_id=".$_REQUEST['bill_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('bill/update_bill_frm.tpl');
		}
} else {
	// Display the Form

$bill = new bill();
$bill->view_bill($_REQUEST['bill_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_bill_frm');
	SmartyValidate::register_validator('vendor_id',	'vendor_id', 'notEmpty');
	SmartyValidate::register_validator('bill_date_create',	'bill_date_create', 'notEmpty');
	SmartyValidate::register_validator('bill_due_date',	'bill_due_date', 'notEmpty');
	SmartyValidate::register_validator('bill_amount_due',	'bill_amount_due', 'notEmpty');

$smarty->assign('bill',$bill);
$smarty->display('bill/update_bill_frm.tpl');
}
?>