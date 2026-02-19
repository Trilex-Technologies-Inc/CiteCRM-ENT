<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_workorder_status.php<br>
* Purpose:  Update a Single Workorder Status row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/workorder_status.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new workorder_status
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$workorder_status = new workorder_status();
			$workorder_status->update_workorder_status($_REQUEST);
			$core->force_page("index.php?page=workorder_status:view_workorder_status&workorder_status_id=".$_REQUEST['workorder_status_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('workorder_status/update_workorder_status_frm.tpl');
		}
} else {
	// Display the Form

$workorder_status = new workorder_status();
$workorder_status->view_workorder_status($_REQUEST['workorder_status_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_workorder_status_frm');
	SmartyValidate::register_validator('workorder_status_text',	'workorder_status_text', 'notEmpty');

$smarty->assign('workorder_status',$workorder_status);
$smarty->display('workorder_status/update_workorder_status_frm.tpl');
}
?>