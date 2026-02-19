<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_new_user_address.php<br>
 * Purpose:  Displays all users<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/


$core->verifyAdmin();

require(CLASS_PATH."/core/user_address.class.php");

$address = new user_address();

// Process Form
if(isset($_REQUEST['submit']) ) {
	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		$address->createNewAddress($_REQUEST);
		
		$core->force_page('/index.php?page=user:admin_view_user_detail&userID='.$_REQUEST['user_id']);

	} else {
	
		// error, redraw the form		 
		$smarty ->assign('errorOccurred', true);
		
		$smarty->display('user_address/admin_new_user_address_frm.tpl');
	}

} else {
	// Display the Form

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('new_address_frm');
	
	$smarty->assign('user_id',$_REQUEST['user_id']);

	$smarty->display('user_address/admin_new_user_address_frm.tpl');
}


?>
?>