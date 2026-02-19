<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_note.php<br>
	* Purpose:  Update a Single Notes row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

$core->verifyAdmin(CAN_EDIT);

require(CLASS_PATH.'/core/note.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new note
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$note = new note();
			$note->update_note($_REQUEST);
			$core->force_page("index.php?page=note:view_note&note_id=".$_REQUEST['note_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('note/update_note_frm.tpl');
		}
} else {
	// Display the Form

$note = new note();
$note->view_note($_REQUEST['note_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_note_frm');

$smarty->assign('note',$note);
$smarty->display('note/update_note_frm.tpl');
}
?>