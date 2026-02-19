<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     update_system.php<br>
 * Purpose:  Update a Single System row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

	$core->verifyAdmin();
	
	require(CLASS_PATH.'/core/system.class.php');
	require(CLASS_PATH.'/core/company.class.php');
	require(CLASS_PATH.'/core/user.class.php');
	
	// Display the Form

	$system 		= new system();
	
	$company 	= new company();

	$user 		= new user();
	
	
	$system->view_system($_REQUEST['system_id']);
	
	$company->system_to_company($_REQUEST['system_id']);

	$user->system_to_user($_REQUEST['system_id']);
	
	$smarty->assign('system',$system);
	
	$smarty->assign('company',$company);

	$smarty->assign('user',$user);
	
// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new system
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$system = new system();
			$system->update_system($_REQUEST);
			$core->force_page("index.php?page=system:view_system&system_id=".$_REQUEST['system_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('system/update_system_frm.tpl');
		}
} else {


	SmartyValidate::connect($smarty, true);
	
	SmartyValidate::register_form('update_system_frm');
	
	
	
	
	
	$smarty->display('system/update_system_frm.tpl');
	
}
?>