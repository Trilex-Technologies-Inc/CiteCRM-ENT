<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_user_to_company.php<br>
	* Purpose:  delete a Single User To Company row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/user_to_company.class.php');

	$core->verifyAdmin();

	$userID = $_REQUEST['user_id'];
	
	$companyID = $_REQUEST['company_id'];

	$user_to_company = new user_to_company();

	$user_to_company->delete_user_to_company($userID,$companyID);

	$core->force_page("index.php?page=company:view_company&company_id=".$companyID);

?>