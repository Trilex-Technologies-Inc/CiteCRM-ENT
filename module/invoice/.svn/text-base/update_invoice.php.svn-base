<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_invoice.php<br>
	* Purpose:  Update a Single Invoice row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');
	require(CLASS_PATH.'/core/invoice.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new invoice
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$invoice = new invoice();
			$invoice->update_invoice($_REQUEST);
			$core->force_page("index.php?page=invoice:view_invoice&invoice_id=".$_REQUEST['invoice_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('invoice/update_invoice_frm.tpl');
		}
} else {
	// Display the Form

$invoice = new invoice();
$invoice->view_invoice($_REQUEST['invoice_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_invoice_frm');

$smarty->assign('invoice',$invoice);
$smarty->display('invoice/update_invoice_frm.tpl');
}
?>