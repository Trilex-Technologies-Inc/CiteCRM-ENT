<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_company_to_workorder.php<br>
	* Purpose:  View a Single Company To Work Order row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/company_to_workorder.class.php');

	$core->verifyAdmin();
	$company_to_workorder = new company_to_workorder();

$company_to_workorder->view_company_to_workorder($_REQUEST['company_to_workorder_id']);

$smarty->assign('company_to_workorder', $company_to_workorder);

$smarty->display('company_to_workorder/view_company_to_workorder.tpl');

?>