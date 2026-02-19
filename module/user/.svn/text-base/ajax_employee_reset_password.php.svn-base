<?php
$core->verifyAdmin(SUPER_USER);

$user_id = $_REQUEST['user_id'];

$smarty->assign('user_id',$user_id);

if(isset($_POST['submit'])) {
	require_once(CLASS_PATH."/core/user.class.php");
	$userObj = new user();

	$password = md5($_POST['user_password']);

	$userObj->reset_password($user_id, $password);

		
	
	
} else {

	$smarty->display('user/ajax_employee_reset_password.tpl');
}

?>