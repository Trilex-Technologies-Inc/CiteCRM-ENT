<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     add_tax_rate.php<br>
* Purpose:  Add New Tax Rates<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/tax_rate.class.php');

$tax_rate = new tax_rate();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new tax_rate
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$tax_rate_id = $tax_rate->add_tax_rate($_REQUEST);
			$core->force_page("index.php?page=tax_rate:view_tax_rate&tax_rate_id=".$tax_rate_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('tax_rate/add_tax_rate_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_tax_rate_frm');
	$smarty->display('tax_rate/add_tax_rate_frm.tpl');
}
?>