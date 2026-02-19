<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_company_contact.php<br>
	* Purpose:  Update a Single Company Contact row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/company_contact.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new company_contact
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$company_contact = new company_contact();
			$company_contact->update_company_contact($_REQUEST);
			$core->force_page("index.php?page=company_contact:view_company_contact&company_contact_id=".$_REQUEST['company_contact_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('company_contact/update_company_contact_frm.tpl');
		}
} else {
	// Display the Form

$company_contact = new company_contact();
$company_contact->view_company_contact($_REQUEST['company_contact_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_company_contact_frm');
	SmartyValidate::register_validator('company_contact_type',	'company_contact_type', 'notEmpty');
	SmartyValidate::register_validator('company_contact_value',	'company_contact_value', 'notEmpty');

$smarty->assign('company_contact',$company_contact);
$smarty->display('company_contact/update_company_contact_frm.tpl');
}
?>