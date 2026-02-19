<?php
$core->verifyAdmin(SUPER_USER);
require_once(CLASS_PATH."/core/user.class.php");

$userObj = new user();

$user_id = $_REQUEST['user_id'];

if(isset($_POST['submit'])) {

	$permissions = $_POST['permissions'];

	$userObj->save_permisions($user_id,$permissions);
	
} else {
	$userObj->loadUserByID($user_id);

	$smarty->assign('userObj',$userObj);

	$smarty->display('user/ajax_load_employee_permisions.tpl');

}

?>