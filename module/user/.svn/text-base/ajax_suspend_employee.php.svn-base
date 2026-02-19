<?php

/**
 * @author 
 * @copyright 2007
 */
$core->verifyAdmin(SUPER_ADMIN);


if(isset($_POST['submit'])){
	require_once(CLASS_PATH."/core/user.class.php");
	$userObj = new user();
	
	$suspension_reason = $core-> prepare_post($_POST['suspension_reason']);
	$user_id = $_POST['user_id'];
	$userObj->suspend_user($user_id,$suspension_reason);	
} else {
	$smarty->display('user/ajax_suspend_employee.tpl');
}


?>