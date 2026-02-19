<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_note.php<br>
	* Purpose:  Add New Notes<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/note.class.php');
$note = new note();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new note
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$note_id = $note->add_note($_REQUEST);
			$core->force_page("index.php?page=note:view_note&note_id=".$note_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('note/add_note_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_note_frm');
	$smarty->display('note/add_note_frm.tpl');
}
?>