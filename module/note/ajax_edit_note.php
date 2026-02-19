<?php
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/note.class.php');
$noteObj = new note();


if(isset($_POST['submit'])) {

    require_once(CLASS_PATH."/core/user.class.php");

    $userObj = new user();

    $user_id = $_SESSION['SESSION_USER_ID'];

    $userObj->loadUserByID($user_id);

    $edit_name = $userObj->getUserFirstName() . " " . $userObj->getUserLastName();

    $edit_date = date("H:i m-d-Y");
    
    $note_id            = $_POST['note_id'];

    $noteObj->view_note($note_id);

    $do_delete          = $_POST['do_delete'];

    $note_text = $_POST['note_text'];

    if($do_delete == true) {
        $note_active    = '0';
        $note_text = $note_text . "\n\n Note Deleted by: $edit_name On: $edit_date";
    } else {
        $note_active = '1';
        $note_text = $note_text . "\n\n Note Edit by: $edit_name On: $edit_date";
    }


    $note_subject       = $_POST['note_subject'];
	$note_text			= $core->prepare_post($note_text);
    $note_type          = $noteObj->get_note_type();
    $note_type_id       = $noteObj->get_note_type_id();
    $note_enter_by      = $noteObj->get_note_enter_by();
    $note_create_date   = $noteObj->get_note_create_date();

    $noteObj->update_note($note_id,$note_active,$note_subject,$note_text,$note_type,$note_type_id,$note_enter_by,$note_create_date);

} else {
    $note_id = $_GET['note_id'];
    $noteObj->view_note($note_id);
    $noteObj->fields['note_text'] = $core->prepare_edit($noteObj->get_note_text());
    $smarty->assign('noteObj',$noteObj);
    $smarty->display('note/ajax_edit_note.tpl');

}



?>