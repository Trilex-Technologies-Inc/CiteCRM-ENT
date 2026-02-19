<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_suspension.php<br>
	* Purpose:  Search Suspension<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/suspension.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=suspension:search_suspension');

	$suspension = new suspension();
	$suspensionArray = $suspension->search_suspension();
	$smarty->assign('suspensionArray', $suspensionArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('suspension/search_suspension.tpl');

?>