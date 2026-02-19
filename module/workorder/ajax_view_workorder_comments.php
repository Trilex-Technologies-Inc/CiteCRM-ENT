<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_view_workorder_notes.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);
	
$workorder_id = $_REQUEST['workorder_id'];
	
require(CLASS_PATH.'/core/workorder_comment.class.php');
	
$workorder_comment	= new workorder_comment();
	
$workorder_comment_array 	= $workorder_comment->load_by_workorder_id($workorder_id);
	
$smarty->assign('workorder_comment_array',	$workorder_comment_array);
	
$smarty->display('workorder/ajax_view_workorder_comments.tpl');
?>