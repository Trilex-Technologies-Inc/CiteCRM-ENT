<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_workorder_note.php<br>
* Purpose:  Update a Single Work Order Note row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(CAN_EDIT);

require(CLASS_PATH.'/core/workorder_note.class.php');

$workorder_note = new workorder_note();

// If form Submission
if(isset($_REQUEST['submit']) ) {

    $workorder_note_id      = $_POST['workorder_note_id'];
    $workorder_note_subject = $_POST['workorder_note_subject'];
    $workorder_note_text    = $_POST['workorder_note_text'];
    $do_delete              = $_POST['do_delete'];

    $append = "<br />Note edit by " . $core->display_names($_SESSION['SESSION_USER_ID']) . " On " . date("m-d-Y H:i",time());

    $workorder_note_text .=  $append;
    

    if($do_delete == true) {
        $workorder_note->delete_workorder_note($workorder_note_id);
        $core->log_action($_SESSION['SESSION_USER_ID'],'Delete','Deleted work order note #'.$workorder_note_id);
    } else {
        $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Edit work order note #'.$workorder_note_id);
        $workorder_note->update_workorder_note($workorder_note_id,$workorder_note_text,$workorder_note_subject);
    }
		
} else {    
	
	$workorder_note->view_workorder_note($_REQUEST['workorder_note_id']);

    $workorder_note->fields['workorder_note_text'] = $core->prepare_edit($workorder_note->get_workorder_note_text());

	$smarty->assign('workorder_note',$workorder_note);
	
	$smarty->display('workorder_note/update_workorder_note_frm.tpl');
	
}
?>