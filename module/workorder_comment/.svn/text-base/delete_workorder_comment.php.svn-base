<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     delete_workorder_comment.php<br>
 * Purpose:  delete a Single Work Order Comment row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

	require(CLASS_PATH.'/core/workorder_comment.class.php');

	$core->verifyAdmin();

	$workorder_comment = new workorder_comment();

	$workorder_comment->delete_workorder_comment($_REQUEST['workorder_comment_id']);

	$smarty->display('workorder_comment/delete_workorder_comment.tpl')

?>