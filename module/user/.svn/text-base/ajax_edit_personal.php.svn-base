<?php

/**
 * @author Jaimie
 * @copyright 2007
 */
$core->verifyAdmin(CAN_EDIT);
require_once(CLASS_PATH."/core/user.class.php");
$userObj = new user();

if(isset($_POST['submit'])){
	$user_id 				= $_POST['user_id'];
	$first_name 			= $_POST['first_name']; 
	$last_name 				= $_POST['last_name'];
	$email 					= $_POST['email'];
	$user_type_id			= '1';
	$user_admin				= '1';
	
	$userObj->update_user($user_id,$first_name,$last_name,$user_type_id,$user_admin,$email);

} else {

	$user_id = $_POST['user_id'];

	$userObj->loadUserByID($user_id);
	
	$smarty->assign('userObj',$userObj);
	
	$smarty->display('user/ajax_edit_personal.tpl');
}

?>