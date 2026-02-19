<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_invoice_labor.php<br>
	* Purpose:  Add New Invoice Labor<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/invoice_labor.class.php');
$invoice_labor = new invoice_labor();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new invoice_labor
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$invoice_labor_id = $invoice_labor->add_invoice_labor($_REQUEST);
			$core->force_page("index.php?page=invoice_labor:view_invoice_labor&invoice_labor_id=".$invoice_labor_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('invoice_labor/add_invoice_labor_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_invoice_labor_frm');
	$smarty->display('invoice_labor/add_invoice_labor_frm.tpl');
}
?>