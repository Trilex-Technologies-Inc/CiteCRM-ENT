<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_vendor_contact.php<br>
	* Purpose:  Add New Vendor Contact<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/vendor_contact.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new vendor_contact
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$vendor_contact = new vendor_contact();
			$vendor_contact_id = $vendor_contact->add_vendor_contact($_REQUEST);
			$core->force_page("index.php?page=vendor_contact:view_vendor_contact&vendor_contact_id=".$vendor_contact_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('vendor_contact/add_vendor_contact_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_vendor_contact_frm');
	$smarty->display('vendor_contact/add_vendor_contact_frm.tpl');
}
?>