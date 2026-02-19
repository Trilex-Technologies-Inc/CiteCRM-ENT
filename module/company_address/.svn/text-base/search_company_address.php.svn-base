<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_company_address.php<br>
	* Purpose:  Search Company Address<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/company_address.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=company_address:search_company_address');

	$company_address = new company_address();
	$company_addressArray = $company_address->search_company_address();
	$smarty->assign('company_addressArray', $company_addressArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('company_address/search_company_address.tpl');

?>