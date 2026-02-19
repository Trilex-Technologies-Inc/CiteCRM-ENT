<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/user.class.php");

$userObj = new user();

$user_id = $_REQUEST['user_id'];

if(isset($_POST['submit'])) {

	$user_id = $_POST['user_id'];
	$user_first_name = $_POST['user_first_name'];
	$user_last_name = $_POST['user_last_name'];
	$user_type_id = $_POST['user_type_id'];
	$user_admin = 0;
	$user_email = $_POST['user_email'];
	
	$userObj->update_user($user_id,$user_first_name,$user_last_name,$user_type_id,$user_admin,$user_email);	
	
} else {
	$userObj->loadUserByID($user_id);

	$smarty->assign('userObj',$userObj);

	$smarty->display('user/ajax_user_edit.tpl');
}
?>