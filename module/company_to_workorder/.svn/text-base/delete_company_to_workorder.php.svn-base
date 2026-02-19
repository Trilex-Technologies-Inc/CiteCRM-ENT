<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_company_to_workorder.php<br>
	* Purpose:  delete a Single Company To Work Order row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/company_to_workorder.class.php');

	$core->verifyAdmin();

$company_to_workorder = new company_to_workorder();

$company_to_workorder->delete_company_to_workorder($_REQUEST['company_to_workorder_id']);

$smarty->display('company_to_workorder/delete_company_to_workorder.tpl')

?>