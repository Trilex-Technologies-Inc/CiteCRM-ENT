<?php
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/note.class.php');
$noteObj = new note();


if(isset($_POST['submit'])) {

	$note_type			= $_POST['note_type'];
	$note_type_id		= $_POST['note_type_id'];
    $note_subject       = $_POST['note_subject'];
	$note_text			= $core->prepare_post($_POST['note_text']);
	$note_enter_by		= $_SESSION['SESSION_USER_ID'];
	$note_create_date	= time();
	$note_active		= '1';

	$noteObj->add_note($note_type,$note_type_id,$note_subject,$note_text,$note_enter_by,$note_create_date,$note_active);

} else {
	
	$smarty->assign('note_type', $_GET['note_type']);
	$smarty->assign('note_type_id',$_GET['note_type_id']);
	$smarty->display('note/ajax_new_note.tpl');

}


?>