<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_country.php<br>
* Purpose:  Update a Single Country row<br>
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
			$country->update_country($_REQUEST);
			$core->force_page("index.php?page=country:view_country&country_id=".$_REQUEST['country_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('country/update_country_frm.tpl');
		}
} else {
	// Display the Form

$country = new country();
$country->view_country($_REQUEST['country_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_country_frm');
	SmartyValidate::register_validator('country_code',	'country_code', 'notEmpty');
	SmartyValidate::register_validator('country_text',	'country_text', 'notEmpty');

$smarty->assign('country',$country);
$smarty->display('country/update_country_frm.tpl');
}
?>