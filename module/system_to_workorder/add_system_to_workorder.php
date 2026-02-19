<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_system_to_workorder.php<br>
	* Purpose:  Add New System To Workorder<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/system_to_workorder.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new system_to_workorder
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$system_to_workorder = new system_to_workorder();
			$system_to_workorder_id = $system_to_workorder->add_system_to_workorder($_REQUEST);
			$core->force_page("index.php?page=system_to_workorder:view_system_to_workorder&system_to_workorder_id=".$system_to_workorder_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('system_to_workorder/add_system_to_workorder_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_system_to_workorder_frm');
	SmartyValidate::register_validator('system_id',	'system_id', 'notEmpty');
	SmartyValidate::register_validator('workorder_id',	'workorder_id', 'notEmpty');
	$smarty->display('system_to_workorder/add_system_to_workorder_frm.tpl');
}
?>