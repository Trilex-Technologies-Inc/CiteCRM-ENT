<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_workorder_comment.php<br>
	* Purpose:  Search Work Order Comment<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_comment.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=workorder_comment:search_workorder_comment');

	$workorder_comment = new workorder_comment();
	$workorder_commentArray = $workorder_comment->search_workorder_comment();
	$smarty->assign('workorder_commentArray', $workorder_commentArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('workorder_comment/search_workorder_comment.tpl');

?>