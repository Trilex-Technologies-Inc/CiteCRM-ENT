<?php
/**  
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_update_contact.php<br>
 * Purpose:  Updates A user Contact Information<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();

require(CLASS_PATH."/core/user_contact.class.php");

$user_contact = new user_contact();

$user_contact->loadBYContactID($_REQUEST['contact_id']);

$smarty->assign('user_contact', $user_contact);

if(isset($_REQUEST['submit']) ) {

	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
			
		$user_contact->update_user_contact($_REQUEST);
		
		$core->force_page('/index.php?page=user:admin_view_user_detail&userID='.$_REQUEST['user_id']);

	} else {
	
		// error, redraw the form
		$smarty->assign('errorOccurred', true);
           
		$smarty->display('user_contact/admin_update_user_contact_frm.tpl');
           
	}

} else {

	// Display the Form



	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('new_contact_frm');
	
	
	
	$smarty->display('user_contact/admin_update_user_contact_frm.tpl');
	
}


?>