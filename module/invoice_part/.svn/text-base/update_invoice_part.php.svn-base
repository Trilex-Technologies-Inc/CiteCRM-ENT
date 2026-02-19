<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_invoice_part.php<br>
	* Purpose:  Update a Single Invoice Part row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/invoice_part.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new invoice_part
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$invoice_part = new invoice_part();
			$invoice_part->update_invoice_part($_REQUEST);
			$core->force_page("index.php?page=invoice_part:view_invoice_part&invoice_part_id=".$_REQUEST['invoice_part_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('invoice_part/update_invoice_part_frm.tpl');
		}
} else {
	// Display the Form

$invoice_part = new invoice_part();
$invoice_part->view_invoice_part($_REQUEST['invoice_part_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_invoice_part_frm');

$smarty->assign('invoice_part',$invoice_part);
$smarty->display('invoice_part/update_invoice_part_frm.tpl');
}
?>