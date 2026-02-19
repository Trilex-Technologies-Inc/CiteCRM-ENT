<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_state.php<br>
	* Purpose:  Update a Single State row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/state.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new state
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$state = new state();
			$state->update_state($_REQUEST);
			$core->force_page("index.php?page=state:view_state&state_id=".$_REQUEST['state_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('state/update_state_frm.tpl');
		}
} else {
	// Display the Form

$state = new state();
$state->view_state($_REQUEST['state_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_state_frm');
	SmartyValidate::register_validator('country_id',	'country_id', 'notEmpty');
	SmartyValidate::register_validator('state_code',	'state_code', 'notEmpty');
	SmartyValidate::register_validator('state_text',	'state_text', 'notEmpty');

$smarty->assign('state',$state);
$smarty->display('state/update_state_frm.tpl');
}
?>