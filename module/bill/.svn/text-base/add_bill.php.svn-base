<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_bill.php<br>
	* Purpose:  Add New Bills<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/bill.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new bill
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$bill = new bill();
			$bill_id = $bill->add_bill($_REQUEST);
			$core->force_page("index.php?page=bill:view_bill&bill_id=".$bill_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('bill/add_bill_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_bill_frm');
	SmartyValidate::register_validator('vendor_id',	'vendor_id', 'notEmpty');
	SmartyValidate::register_validator('bill_date_create',	'bill_date_create', 'notEmpty');
	SmartyValidate::register_validator('bill_due_date',	'bill_due_date', 'notEmpty');
	SmartyValidate::register_validator('bill_amount_due',	'bill_amount_due', 'notEmpty');
	$smarty->display('bill/add_bill_frm.tpl');
}
?>