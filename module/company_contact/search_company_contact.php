<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_company_contact.php<br>
	* Purpose:  Search Company Contact<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/company_contact.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=company_contact:search_company_contact');

	$company_contact = new company_contact();
	$company_contactArray = $company_contact->search_company_contact();
	$smarty->assign('company_contactArray', $company_contactArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('company_contact/search_company_contact.tpl');

?>