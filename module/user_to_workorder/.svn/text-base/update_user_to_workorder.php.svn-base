<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_user_to_workorder.php<br>
	* Purpose:  Update a Single User To Work Order row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/user_to_workorder.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new user_to_workorder
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$user_to_workorder = new user_to_workorder();
			$user_to_workorder->update_user_to_workorder($_REQUEST);
			$core->force_page("index.php?page=user_to_workorder:view_user_to_workorder&user_to_workorder_id=".$_REQUEST['user_to_workorder_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('user_to_workorder/update_user_to_workorder_frm.tpl');
		}
} else {
	// Display the Form

$user_to_workorder = new user_to_workorder();
$user_to_workorder->view_user_to_workorder($_REQUEST['user_to_workorder_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_user_to_workorder_frm');
	SmartyValidate::register_validator('user_id',	'user_id', 'notEmpty');
	SmartyValidate::register_validator('workorder_id',	'workorder_id', 'notEmpty');

$smarty->assign('user_to_workorder',$user_to_workorder);
$smarty->display('user_to_workorder/update_user_to_workorder_frm.tpl');
}
?>