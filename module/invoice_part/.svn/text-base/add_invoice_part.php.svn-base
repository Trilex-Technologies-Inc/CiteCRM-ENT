<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_invoice_part.php<br>
	* Purpose:  Add New Invoice Part<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/invoice_part.class.php');
$invoice_part = new invoice_part();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new invoice_part
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$invoice_part_id = $invoice_part->add_invoice_part($_REQUEST);
			$core->force_page("index.php?page=invoice_part:view_invoice_part&invoice_part_id=".$invoice_part_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('invoice_part/add_invoice_part_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_invoice_part_frm');
	$smarty->display('invoice_part/add_invoice_part_frm.tpl');
}
?>