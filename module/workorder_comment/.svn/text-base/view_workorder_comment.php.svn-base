<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_workorder_comment.php<br>
 * Purpose:  View a Single Work Order Comment row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

	$smarty->caching = false;

	$core->verifyAdmin();
	
	require(CLASS_PATH.'/core/workorder_comment.class.php');
	
	$workorder_comment = new workorder_comment();

	$workorder_comment->view_workorder_comment($_REQUEST['workorder_comment_id']);

	$smarty->assign('workorder_comment', $workorder_comment);

	$smarty->display('workorder_comment/view_workorder_comment.tpl');

?>