<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_user_to_company.php<br>
	* Purpose:  Search User To Company<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/user_to_company.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=user_to_company:search_user_to_company');

	$user_to_company = new user_to_company();
	$user_to_companyArray = $user_to_company->search_user_to_company();
	$smarty->assign('user_to_companyArray', $user_to_companyArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('user_to_company/search_user_to_company.tpl');

?>