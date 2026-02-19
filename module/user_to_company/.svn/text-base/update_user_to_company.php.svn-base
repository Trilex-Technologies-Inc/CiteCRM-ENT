<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_user_to_company.php<br>
	* Purpose:  Update a Single User To Company row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/user_to_company.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new user_to_company
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$user_to_company = new user_to_company();
			$user_to_company->update_user_to_company($_REQUEST);
			$core->force_page("index.php?page=user_to_company:view_user_to_company&user_to_company_id=".$_REQUEST['user_to_company_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('user_to_company/update_user_to_company_frm.tpl');
		}
} else {
	// Display the Form

$user_to_company = new user_to_company();
$user_to_company->view_user_to_company($_REQUEST['user_to_company_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_user_to_company_frm');

$smarty->assign('user_to_company',$user_to_company);
$smarty->display('user_to_company/update_user_to_company_frm.tpl');
}
?>