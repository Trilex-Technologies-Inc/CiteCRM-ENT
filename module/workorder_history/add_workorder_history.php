<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_workorder_history.php<br>
	* Purpose:  Add New Work Order History<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/workorder_history.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new workorder_history
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$workorder_history = new workorder_history();
			$workorder_history_id = $workorder_history->add_workorder_history($_REQUEST);
			$core->force_page("index.php?page=workorder_history:view_workorder_history&workorder_history_id=".$workorder_history_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('workorder_history/add_workorder_history_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_workorder_history_frm');
	SmartyValidate::register_validator('workorder_id',	'workorder_id', 'notEmpty');
	SmartyValidate::register_validator('workorder_history_text',	'workorder_history_text', 'notEmpty');
	SmartyValidate::register_validator('workorder_history_create_date',	'workorder_history_create_date', 'notEmpty');
	$smarty->display('workorder_history/add_workorder_history_frm.tpl');
}
?>