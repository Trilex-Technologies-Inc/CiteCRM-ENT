<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_user_to_company.php<br>
	* Purpose:  View a Single User To Company row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/user_to_company.class.php');

	$core->verifyAdmin();
	$user_to_company = new user_to_company();

$user_to_company->view_user_to_company($_REQUEST['user_to_company_id']);

$smarty->assign('user_to_company', $user_to_company);

$smarty->display('user_to_company/view_user_to_company.tpl');

?>