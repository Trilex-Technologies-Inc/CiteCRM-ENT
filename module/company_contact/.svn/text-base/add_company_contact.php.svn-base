<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_company_contact.php<br>
	* Purpose:  Add New Company Contact<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/company_contact.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new company_contact
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$company_contact = new company_contact();
			$company_contact_id = $company_contact->add_company_contact($_REQUEST);
			$core->force_page("index.php?page=company_contact:view_company_contact&company_contact_id=".$company_contact_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('company_contact/add_company_contact_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_company_contact_frm');
	SmartyValidate::register_validator('company_contact_type',	'company_contact_type', 'notEmpty');
	SmartyValidate::register_validator('company_contact_value',	'company_contact_value', 'notEmpty');
	$smarty->display('company_contact/add_company_contact_frm.tpl');
}
?>