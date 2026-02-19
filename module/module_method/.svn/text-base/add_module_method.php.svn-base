<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_module_method.php<br>
	* Purpose:  Add New Module Method<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);


require(CLASS_PATH.'/core/module_method.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new module_method
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$module_method = new module_method();
			$module_method->add_module_method($_REQUEST);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('module_method/add_module_method_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_module_method_frm');
	SmartyValidate::register_validator('module_id',	'module_id', '');
	SmartyValidate::register_validator('module_method_name',	'module_method_name', 'notEmpty');
	SmartyValidate::register_validator('module_method_translate',	'module_method_translate', 'notEmpty');
	SmartyValidate::register_validator('module_method_admin_menu',	'module_method_admin_menu', '');
	SmartyValidate::register_validator('module_method_user_menu',	'module_method_user_menu', '');
	SmartyValidate::register_validator('module_method_public_menu',	'module_method_public_menu', '');
	$smarty->display('module_method/add_module_method_frm.tpl');
}
?>