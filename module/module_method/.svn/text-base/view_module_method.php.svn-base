<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_module_method.php<br>
	* Purpose:  View a Single Module Method row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/module_method.class.php');

	$module_method = new module_method();

$module_method->view_module_method($_REQUEST['module_method_id']);

$smarty->assign('module_method', $module_method);

$smarty->display('module_method/view_module_method.tpl');

?>