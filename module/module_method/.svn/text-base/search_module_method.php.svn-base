<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_module_method.php<br>
	* Purpose:  Search Module Method<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);

	require(CLASS_PATH.'/core/module_method.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=module_method:search_module_method');

	$module_method = new module_method();
	$module_methodArray = $module_method->search_module_method();
	$smarty->assign('module_methodArray', $module_methodArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('module_method/search_module_method.tpl');

?>