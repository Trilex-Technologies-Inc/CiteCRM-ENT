<?php
require(CLASS_PATH."/core/contact.class.php");

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

$core->verifyAdmin();

if(isset($_REQUEST['submit']) ) {

	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		$contact = new contact();
		
		$contact->createNewContact($_REQUEST);
		
		$core->force_page('/index.php?page=user:adminViewUserDetail&userID='.$_REQUEST['user_id']);


	} else {
	
		// error, redraw the form
           $smarty->assign($_POST);
           
           $smarty->display('user/adminNewContactFrm.tpl');
           
	}

} else {

	// Display the Form

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('new_contact_frm');
	
	SmartyValidate::register_validator('contact_type',	'contact_type', 'notEmpty');
	
	SmartyValidate::register_validator('contact_value',	'contact_value', 'notEmpty');
	
	$smarty->assign('user_id', $_REQUEST['user_id']);
	
	$smarty->display('user/adminNewContactFrm.tpl');
	
}


?>