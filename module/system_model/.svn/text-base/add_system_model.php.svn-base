<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_system_model.php<br>
	* Purpose:  Add New System Module<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/system_model.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new system_model
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$system_model = new system_model();
			$system_model_id = $system_model->add_system_model($_REQUEST);
			$core->force_page("index.php?page=system_model:view_system_model&system_model_id=".$system_model_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('system_model/add_system_model_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_system_model_frm');
	SmartyValidate::register_validator('system_manufacture_id',	'system_manufacture_id', 'notEmpty');
	SmartyValidate::register_validator('system_model_name',	'system_model_name', 'notEmpty');
	$smarty->display('system_model/add_system_model_frm.tpl');
}
?>