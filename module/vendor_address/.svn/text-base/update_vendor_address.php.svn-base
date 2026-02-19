<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_vendor_address.php<br>
	* Purpose:  Update a Single Vendor Address row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/vendor_address.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new vendor_address
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$vendor_address = new vendor_address();
			$vendor_address->update_vendor_address($_REQUEST);
			$core->force_page("index.php?page=vendor_address:view_vendor_address&vendor_address_id=".$_REQUEST['vendor_address_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('vendor_address/update_vendor_address_frm.tpl');
		}
} else {
	// Display the Form

$vendor_address = new vendor_address();
$vendor_address->view_vendor_address($_REQUEST['vendor_address_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_vendor_address_frm');
	SmartyValidate::register_validator('vendor_address_type',	'vendor_address_type', 'notEmpty');
	SmartyValidate::register_validator('vendor_street_1',	'vendor_street_1', 'notEmpty');
	SmartyValidate::register_validator('vendor_city',	'vendor_city', 'notEmpty');
	SmartyValidate::register_validator('vendor_state_id',	'vendor_state_id', 'notEmpty');
	SmartyValidate::register_validator('vendor_postal_code',	'vendor_postal_code', 'notEmpty');
	SmartyValidate::register_validator('vendor_country_id',	'vendor_country_id', 'notEmpty');

$smarty->assign('vendor_address',$vendor_address);
$smarty->display('vendor_address/update_vendor_address_frm.tpl');
}
?>