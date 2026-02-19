<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_workorder_history.php<br>
	* Purpose:  Search Work Order History<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_history.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=workorder_history:search_workorder_history');

	$workorder_history = new workorder_history();
	$workorder_historyArray = $workorder_history->search_workorder_history();
	$smarty->assign('workorder_historyArray', $workorder_historyArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('workorder_history/search_workorder_history.tpl');

?>