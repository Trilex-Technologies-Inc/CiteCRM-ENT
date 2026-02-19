<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     adminNewModule.php<br>
 * Purpose:  Developes New Module<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

if(!empty($_REQUEST['submit'])) {
	

	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();

		// Create Module

		$module = new module();	
		
		$module_id = $module->newModule($_REQUEST);

		$core->force_page("index.php?page=module:view_module&module_id=" . $module_id);

	} else {

		$smarty->display('module/adminNewModuleFrm.tpl');
	}


} else {

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('new_module_frm');

	SmartyValidate::register_validator('moduleName',	'moduleName', 'isModule');
	SmartyValidate::register_validator('moduleTranslateName',	'moduleTranslateName', 'notEmpty');
	
	SmartyValidate::register_validator('searchTranslate',	'searchTranslate', 'notEmpty');
	SmartyValidate::register_validator('searchPageTitle',	'searchPageTitle', 'notEmpty');
	SmartyValidate::register_validator('addTranslate',	'addTranslate', 'notEmpty');
	SmartyValidate::register_validator('addPageTitle',	'addPageTitle', 'notEmpty');
	SmartyValidate::register_validator('viewTranslate',	'viewTranslate', 'notEmpty');
	SmartyValidate::register_validator('viewPageTitle',	'viewPageTitle', 'notEmpty');
	SmartyValidate::register_validator('updateTranslate',	'updateTranslate', 'notEmpty');
	SmartyValidate::register_validator('updatePageTitle',	'updatePageTitle', 'notEmpty');
	SmartyValidate::register_validator('deleteTranslate',	'deleteTranslate', 'notEmpty');
	SmartyValidate::register_validator('deletePageTitle',	'deletePageTitle', 'notEmpty');
	
	SmartyValidate::register_validator('field',	'field', 'validateSql');
	
	$smarty->display('module/adminNewModuleFrm.tpl');

}

?>