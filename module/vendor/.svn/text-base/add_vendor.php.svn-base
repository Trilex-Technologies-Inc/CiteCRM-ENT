<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_vendor.php<br>
 * Purpose:  Add New Vendor<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();

require(CLASS_PATH.'/core/vendor.class.php');

$vendor = new vendor();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new vendor
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			
			$vendor_id = $vendor->add_vendor($_REQUEST);
			$core->force_page("index.php?page=vendor:view_vendor&vendor_id=".$vendor_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('vendor/add_vendor_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_vendor_frm');
	
	$smarty->display('vendor/add_vendor_frm.tpl');
}
?>