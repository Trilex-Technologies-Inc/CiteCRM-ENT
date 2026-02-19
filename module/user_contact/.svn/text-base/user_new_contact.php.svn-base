<?php
require(CLASS_PATH."/core/user_contact.class.php");

$contact = new user_contact();

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

if(isset($_REQUEST['submit']) ) {

	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		
		
		$contact->createNewContact($_REQUEST);
		
		$core->force_page('/index.php?page=user:view_user');


	} else {
	
		// error, redraw the form
           $smarty->assign($_POST);
           
           $smarty->display('user_contact/user_new_contact_frm.tpl');
           
	}

} else {

	// Display the Form

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('new_contact_frm');
	
	SmartyValidate::register_validator('contact_type',	'contact_type', 'notEmpty');
	
	SmartyValidate::register_validator('contact_value',	'contact_value', 'notEmpty');
	
	$smarty->display('user_contact/user_new_contact_frm.tpl');
	
}


?>