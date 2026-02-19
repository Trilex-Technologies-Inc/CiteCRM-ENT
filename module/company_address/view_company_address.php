<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_company_address.php<br>
	* Purpose:  View a Single Company Address row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/company_address.class.php');

	$core->verifyAdmin();
	$company_address = new company_address();

	$company_address->view_company_address($_REQUEST['company_address_id']);

	$smarty->assign('company_address', $company_address);

	$smarty->display('company_address/view_company_address.tpl');

?>