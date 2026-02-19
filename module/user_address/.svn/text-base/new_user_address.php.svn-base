<?php
$auth = &new Auth($db, '/index.php?page=user:login_user', 'secret');

require(CLASS_PATH."/core/user_address.class.php");



// Process Form
if(isset($_REQUEST['submit']) ) {
	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		// Save New Address
		$address = new user_address();
		
		$address->createNewAddress($_REQUEST);
		
		$core->force_page('/index.php?page=user:view_user');


	} else {
	
		// error, redraw the form
           $smarty->assign($_POST);
           
           $smarty->display('user_address/new_user_address_frm.tpl');
	}

} else {
	// Display the Form

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('new_address_frm');	

	$smarty->display('user_address/new_user_address_frm.tpl');
}


?>