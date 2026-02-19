<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_suspension.php<br>
	* Purpose:  Update a Single Suspension row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/suspension.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new suspension
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$suspension = new suspension();
			$suspension->update_suspension($_REQUEST);
			$core->force_page("index.php?page=suspension:view_suspension&suspension_id=".$_REQUEST['suspension_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('suspension/update_suspension_frm.tpl');
		}
} else {
	// Display the Form

$suspension = new suspension();
$suspension->view_suspension($_REQUEST['suspension_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_suspension_frm');
	SmartyValidate::register_validator('suspension_reason_id',	'suspension_reason_id', 'notEmpty');
	SmartyValidate::register_validator('user_id',	'user_id', 'notEmpty');
	SmartyValidate::register_validator('suspension_start',	'suspension_start', 'notEmpty');
	SmartyValidate::register_validator('suspension_end',	'suspension_end', 'notEmpty');
	SmartyValidate::register_validator('suspension_create_by',	'suspension_create_by', 'notEmpty');
	SmartyValidate::register_validator('suspension_active',	'suspension_active', 'notEmpty');

$smarty->assign('suspension',$suspension);
$smarty->display('suspension/update_suspension_frm.tpl');
}
?>