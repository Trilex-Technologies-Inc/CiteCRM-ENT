<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_update_user.php<br>
 * Purpose:  Edit A user<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();

$user_id = $_REQUEST['user_id'];

require(CLASS_PATH."/core/user.class.php");

// instantiate the class
$user 		= new user();

$user->loadUserByID($user_id);

$smarty->assign('user', $user);

if(isset($_POST['submit'])) {


	SmartyValidate::connect($smarty);
	
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		
		$user_first_name	= $_POST['user_first_name'];
		$user_last_name	= $_POST['user_last_name'];		
		$user_username		= $_POST['user_username'];
		$user_email			= $_POST['user_email'];
		$user_type_id		= $_POST['user_type_id'];
		$user_admin			= $_POST['user_admin'];
		
		$user->admin_update_user($user_id,$user_first_name,$user_last_name,$user_username,$user_email,$user_type_id,$user_admin);
		
		$core->force_page("/index.php?page=user:admin_view_user_detail&userID=".$user_id);
		
	} else {
	
		         
		$smarty->assign("errorOccurred",true);
		
		$smarty->display('user/admin_update_user.tpl');
	}



} else {

	SmartyValidate::connect($smarty, true);

	SmartyValidate::register_form('update_user_frm');
	
	$smarty->display('user/admin_update_user.tpl');

}