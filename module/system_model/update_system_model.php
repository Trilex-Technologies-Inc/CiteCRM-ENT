<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_system_model.php<br>
	* Purpose:  Update a Single System Module row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/system_model.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new system_model
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$system_model = new system_model();
			$system_model->update_system_model($_REQUEST);
			$core->force_page("index.php?page=system_model:view_system_model&system_model_id=".$_REQUEST['system_model_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('system_model/update_system_model_frm.tpl');
		}
} else {
	// Display the Form

$system_model = new system_model();
$system_model->view_system_model($_REQUEST['system_model_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_system_model_frm');
	SmartyValidate::register_validator('system_manufacture_id',	'system_manufacture_id', 'notEmpty');
	SmartyValidate::register_validator('system_model_name',	'system_model_name', 'notEmpty');

$smarty->assign('system_model',$system_model);
$smarty->display('system_model/update_system_model_frm.tpl');
}
?>