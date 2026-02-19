<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_system_to_workorder.php<br>
	* Purpose:  Search System To Workorder<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/system_to_workorder.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=system_to_workorder:search_system_to_workorder');

	$system_to_workorder = new system_to_workorder();
	$system_to_workorderArray = $system_to_workorder->search_system_to_workorder();
	$smarty->assign('system_to_workorderArray', $system_to_workorderArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('system_to_workorder/search_system_to_workorder.tpl');

?>