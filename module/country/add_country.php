<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_country.php<br>
	* Purpose:  Add New Country<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);
require(CLASS_PATH.'/core/country.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new country
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$country = new country();
			$country_id = $country->add_country($_REQUEST);
			$core->force_page("index.php?page=country:view_country&country_id=".$country_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('country/add_country_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_country_frm');
	SmartyValidate::register_validator('country_code',	'country_code', 'notEmpty');
	SmartyValidate::register_validator('country_text',	'country_text', 'notEmpty');
	$smarty->display('country/add_country_frm.tpl');
}
?>