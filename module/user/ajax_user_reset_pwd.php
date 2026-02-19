<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/user.class.php");

$userObj = new user();

$user_id = $_REQUEST['user_id'];

$userObj->loadUserByID($user_id);

	
if(isset($_POST['submit'])) {

	$user_id 	= $_POST['user_id'];
	$user_password 	= md5($_POST['password']);
	
	
	$userObj->reset_password($user_id,$user_password);
	

} else {

	$smarty->assign('userObj',$userObj);

	$smarty->display('user/ajax_user_reset_pwd.tpl');
}	
	

?>