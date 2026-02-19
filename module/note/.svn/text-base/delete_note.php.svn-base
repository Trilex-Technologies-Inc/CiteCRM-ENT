<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_note.php<br>
* Purpose:  delete a Single Notes row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(CAN_DELETE);

require(CLASS_PATH.'/core/note.class.php');

$note = new note();

$note->delete_note($_REQUEST['note_id']);

$smarty->display('note/delete_note.tpl')

?>