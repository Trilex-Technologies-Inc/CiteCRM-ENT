<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     update_workorder_comment.php<br>
 * Purpose:  Update a Single Work Order Comment row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

	$core->verifyAdmin();
	
	require(CLASS_PATH.'/core/workorder_comment.class.php');

// If form Submission
if(isset($_REQUEST['Submit']) ) {

		
		$workorder_comment = new workorder_comment();
		
		$workorder_comment->update_workorder_comment($_REQUEST);
		
		$core->force_page("index.php?page=workorder_comment:view_workorder_comment&workorder_comment_id=".$_REQUEST['workorder_comment_id']);
			
	
} else {

		// Display the Form

	$workorder_comment = new workorder_comment();
	
	$workorder_comment->view_workorder_comment($_REQUEST['workorder_comment_id']);


	
	$smarty->assign('workorder_comment',$workorder_comment);
	
	$smarty->display('workorder_comment/update_workorder_comment_frm.tpl');
	
}
?>