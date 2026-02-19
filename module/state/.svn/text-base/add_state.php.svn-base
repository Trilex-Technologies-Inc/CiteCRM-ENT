<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_state.php<br>
	* Purpose:  Add New State<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/state.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new state
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$state = new state();
			$state_id = $state->add_state($_REQUEST);
			$core->force_page("index.php?page=state:view_state&state_id=".$state_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('state/add_state_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_state_frm');
	SmartyValidate::register_validator('country_id',	'country_id', 'notEmpty');
	SmartyValidate::register_validator('state_code',	'state_code', 'notEmpty');
	SmartyValidate::register_validator('state_text',	'state_text', 'notEmpty');
	$smarty->display('state/add_state_frm.tpl');
}
?>