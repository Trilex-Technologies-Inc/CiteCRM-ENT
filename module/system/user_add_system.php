<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     user_view_systems.php<br>
 * Purpose:  View users systems<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

require_once(CLASS_PATH.'/core/system.class.php');

$system = new System();

$user_id = $_SESSION['SESSION_USER_ID'];

$smarty->assign('user_id',$user_id);

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
	
	// If valid Post Disconect and add new system
		if(SmartyValidate::is_valid($_POST)) {
		
			SmartyValidate::disconnect();
			
			$system = new system();
			
			$system_id = $system->add_system($_REQUEST);
			
			$core->force_page("index.php?page=system:user_view_systems&system_id=".$system_id);
			
		} else {
			// error, redraw the form
			
			$smarty->assign($_POST);
			
			$smarty->display('system/user_add_system_frm.tpl');
			
		}
		
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_system_frm');
	SmartyValidate::register_validator('system_name',	'system_name', 'notEmpty');
	$smarty->display('system/user_add_system_frm.tpl');
}
?>