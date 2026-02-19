<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_user_to_workorder.php<br>
	* Purpose:  Search User To Work Order<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/user_to_workorder.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=user_to_workorder:search_user_to_workorder');

	$user_to_workorder = new user_to_workorder();
	$user_to_workorderArray = $user_to_workorder->search_user_to_workorder();
	$smarty->assign('user_to_workorderArray', $user_to_workorderArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('user_to_workorder/search_user_to_workorder.tpl');

?>