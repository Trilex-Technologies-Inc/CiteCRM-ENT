<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_workorder_time.php<br>
	* Purpose:  Update a Single Workorder Time row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/workorder_time.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new workorder_time
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$workorder_time = new workorder_time();
			$workorder_time->update_workorder_time($_REQUEST);
			$core->force_page("index.php?page=workorder_time:view_workorder_time&workorder_time_id=".$_REQUEST['workorder_time_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('workorder_time/update_workorder_time_frm.tpl');
		}
} else {
	// Display the Form

$workorder_time = new workorder_time();
$workorder_time->view_workorder_time($_REQUEST['workorder_time_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_workorder_time_frm');

$smarty->assign('workorder_time',$workorder_time);
$smarty->display('workorder_time/update_workorder_time_frm.tpl');
}
?>