<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     adminSuspendUser.php<br>
 * Purpose:  Suspend A user<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH."/core/user.class.php");

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

$core->verifyAdmin();

// instantiate the class
$user 		= new user();


if(empty($_REQUEST['submit'])) {
	
	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		
		
		$core->force_page('index.php?page=user:adminViewUserDetail&userID='.$_REQUEST['user_id']);
		
	} else {
	
		 $smarty->assign($_POST);
		 $smarty->display('user/adminSuspendUserFrm.tpl');
	}
	

} else {

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('user_suspend_frm');

	SmartyValidate::register_validator('user_first_name',	'user_first_name', 'notEmpty');

	$smarty->display('user/adminSuspendUserFrm.tpl');
}
?>