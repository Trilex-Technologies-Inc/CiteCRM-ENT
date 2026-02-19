<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_company_address.php<br>
	* Purpose:  Add New Company Address<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/company_address.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new company_address
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$company_address = new company_address();
			$company_address_id = $company_address->add_company_address($_REQUEST);
			
			$_SESSION['CLEAR_CACHE'] = true;
			
			$core->force_page("index.php?page=company:view_company&company_id=".$_REQUEST['company_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('company_address/add_company_address_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_company_address_frm');
	SmartyValidate::register_validator('company_street_1',	'company_street_1', 'notEmpty');
	SmartyValidate::register_validator('company_city',	'company_city', 'notEmpty');
	SmartyValidate::register_validator('company_state',	'company_state', 'notEmpty');
	SmartyValidate::register_validator('company_postal_code',	'company_postal_code', 'notEmpty');
	SmartyValidate::register_validator('company_country',	'company_country', 'notEmpty');
	$smarty->display('company_address/add_company_address_frm.tpl');
}
?>