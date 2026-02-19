<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_workorder_note.php<br>
	* Purpose:  Search Work Order Note<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_note.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

	// Paginate
	SmartyPaginate::connect();
	SmartyPaginate::setLimit(50);
	SmartyPaginate::setUrl('/?page=workorder_note:search_workorder_note');

	$workorder_note = new workorder_note();
	$workorder_noteArray = $workorder_note->search_workorder_note();
	$smarty->assign('workorder_noteArray', $workorder_noteArray);
	SmartyPaginate::assign($smarty);
	$smarty->display('workorder_note/search_workorder_note.tpl');

?>