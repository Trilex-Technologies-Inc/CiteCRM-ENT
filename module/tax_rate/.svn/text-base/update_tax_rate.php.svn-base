<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_tax_rate.php<br>
* Purpose:  Update a Single Tax Rates row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/tax_rate.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new tax_rate
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$tax_rate = new tax_rate();
			$tax_rate->update_tax_rate($_REQUEST);
			$core->force_page("index.php?page=tax_rate:view_tax_rate&tax_rate_id=".$_REQUEST['tax_rate_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('tax_rate/update_tax_rate_frm.tpl');
		}
} else {
	// Display the Form

$tax_rate = new tax_rate();
$tax_rate->view_tax_rate($_REQUEST['tax_rate_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_tax_rate_frm');

$smarty->assign('tax_rate',$tax_rate);
$smarty->display('tax_rate/update_tax_rate_frm.tpl');
}
?>