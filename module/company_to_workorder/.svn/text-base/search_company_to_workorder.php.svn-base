<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_company_to_workorder.php<br>
	* Purpose:  Search Company To Work Order<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/company_to_workorder.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=company_to_workorder:search_company_to_workorder');

	$company_to_workorder = new company_to_workorder();
	$company_to_workorderArray = $company_to_workorder->search_company_to_workorder();
	$smarty->assign('company_to_workorderArray', $company_to_workorderArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('company_to_workorder/search_company_to_workorder.tpl');

?>