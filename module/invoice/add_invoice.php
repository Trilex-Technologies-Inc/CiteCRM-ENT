<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_invoice.php<br>
	* Purpose:  Add New Invoice<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/invoice.class.php');
$invoice = new invoice();

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new invoice
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$invoice_id = $invoice->add_invoice($_REQUEST);
			$core->force_page("index.php?page=invoice:view_invoice&invoice_id=".$invoice_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('invoice/add_invoice_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_invoice_frm');
	$smarty->display('invoice/add_invoice_frm.tpl');
}
?>