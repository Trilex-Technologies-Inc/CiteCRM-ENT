<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_system_model.php<br>
	* Purpose:  Search System Module<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/system_model.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=system_model:search_system_model');

	$system_model = new system_model();
	$system_modelArray = $system_model->search_system_model();
	$smarty->assign('system_modelArray', $system_modelArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('system_model/search_system_model.tpl');

?>