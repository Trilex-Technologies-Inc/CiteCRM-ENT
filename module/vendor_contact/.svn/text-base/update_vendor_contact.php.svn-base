<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_vendor_contact.php<br>
	* Purpose:  Update a Single Vendor Contact row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/vendor_contact.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new vendor_contact
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$vendor_contact = new vendor_contact();
			$vendor_contact->update_vendor_contact($_REQUEST);
			$core->force_page("index.php?page=vendor_contact:view_vendor_contact&vendor_contact_id=".$_REQUEST['vendor_contact_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('vendor_contact/update_vendor_contact_frm.tpl');
		}
} else {
	// Display the Form

$vendor_contact = new vendor_contact();
$vendor_contact->view_vendor_contact($_REQUEST['vendor_contact_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_vendor_contact_frm');

$smarty->assign('vendor_contact',$vendor_contact);
$smarty->display('vendor_contact/update_vendor_contact_frm.tpl');
}
?>