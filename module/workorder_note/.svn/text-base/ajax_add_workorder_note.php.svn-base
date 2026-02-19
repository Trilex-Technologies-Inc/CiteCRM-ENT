<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_workorder_note.php<br>
 * Purpose:  Add New Work Order Note<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();
require(CLASS_PATH.'/core/workorder_note.class.php');


// If form Submission
if(isset($_POST['submit']) ) {
					
	$workorder_noteObj = new workorder_note();

	$workorder_id				= $_POST['workorder_id'];
    $workorder_subject          = $core->prepare_post($_POST['workorder_subject']);
	$workorder_note_text		= $core->prepare_post($_POST['workorder_note_text']);
	$workorder_note_create_by	= $_SESSION['SESSION_USER_ID'];
	
	$workorder_note_id = $workorder_noteObj->add_workorder_note($workorder_id,$workorder_note_text,$workorder_note_create_by,$workorder_subject);

    $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Create work order note #'.$workorder_note_id);
		
} else {
	$smarty->display('workorder_note/ajax_add_workorder_note.tpl');	
}
?>