<?php
require(CLASS_PATH."/core/user.class.php");

$user = new user();
	
$smarty->caching = false;

if(isset($_REQUEST['submit']) ) {

	SmartyValidate::connect($smarty);	
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
	
		
		// Acitvate User
		
		
		$user->activateUser($_REQUEST['activation_code_text']);
		
		SmartyValidate::connect($smarty, true);

		SmartyValidate::register_form('user_login');
		
		$smarty->display('user/activated_user.tpl');

		
	} else {
		
		$smarty->assign('errorOccurred', true);
		
		$smarty->display('user/activate_user_frm.tpl');
	}
	
	// Display The Form
} else {	

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('user_activation_frm');
	
	
	
	$smarty->display('user/activate_user_frm.tpl');

}


?>