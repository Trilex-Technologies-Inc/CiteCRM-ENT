<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_vendor_address.php<br>
 * Purpose:  Add New Vendor Address<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();

require(CLASS_PATH.'/core/vendor_address.class.php');

$vendor_address = new vendor_address();

// If form Submission
if(isset($_REQUEST['submit']) ) {

	// Conect to smarty validator
	SmartyValidate::connect($smarty);
	
	// If valid Post Disconect and add new vendor_address
	if(SmartyValidate::is_valid($_POST)) {
	
			SmartyValidate::disconnect();
			
			$vendor_address_id = $vendor_address->add_vendor_address($_REQUEST);
			
			$core->force_page("index.php?page=vendor_address:view_vendor_address&vendor_address_id=".$vendor_address_id);
			
		} else {
		
			// error, redraw the form
			$smarty->assign($_POST);
			
			$smarty->assign('errorOccurred', true);
			
			$smarty->display('vendor_address/add_vendor_address_frm.tpl');
		}
		
} else {

	// Display the Form
	SmartyValidate::connect($smarty, true);
	
	SmartyValidate::register_form('new_vendor_address_frm');
	
	$smarty->display('vendor_address/add_vendor_address_frm.tpl');
}
?>