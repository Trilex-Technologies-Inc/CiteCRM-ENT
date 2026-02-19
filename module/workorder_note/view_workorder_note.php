<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_workorder_note.php<br>
	* Purpose:  View a Single Work Order Note row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/workorder_note.class.php');

	$core->verifyAdmin();
	$workorder_note = new workorder_note();

$workorder_note->view_workorder_note($_REQUEST['workorder_note_id']);

$smarty->assign('workorder_note', $workorder_note);

$smarty->display('workorder_note/view_workorder_note.tpl');

?>