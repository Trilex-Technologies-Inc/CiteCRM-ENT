<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_invoice_labor.php<br>
	* Purpose:  Update a Single Invoice Labor row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/invoice_labor.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new invoice_labor
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$invoice_labor = new invoice_labor();
			$invoice_labor->update_invoice_labor($_REQUEST);
			$core->force_page("index.php?page=invoice_labor:view_invoice_labor&invoice_labor_id=".$_REQUEST['invoice_labor_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('invoice_labor/update_invoice_labor_frm.tpl');
		}
} else {
	// Display the Form

$invoice_labor = new invoice_labor();
$invoice_labor->view_invoice_labor($_REQUEST['invoice_labor_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_invoice_labor_frm');

$smarty->assign('invoice_labor',$invoice_labor);
$smarty->display('invoice_labor/update_invoice_labor_frm.tpl');
}
?>