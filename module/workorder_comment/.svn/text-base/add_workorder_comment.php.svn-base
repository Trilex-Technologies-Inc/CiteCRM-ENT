<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_workorder_comment.php<br>
 * Purpose:  Add New Work Order Comment<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH.'/core/workorder_comment.class.php');

$core->verifyAdmin();



// If form Submission
if(isset($_REQUEST['Submit']) ) {

		
		$workorder_comment = new workorder_comment();
		
		$workorder_comment_id = $workorder_comment->add_workorder_comment($_REQUEST);
		
		$core->force_page("index.php?page=workorder_comment:view_workorder_comment&workorder_comment_id=".$workorder_comment_id);
		
		
} else {

	
	$smarty->display('workorder_comment/add_workorder_comment_frm.tpl');
	
}
?>