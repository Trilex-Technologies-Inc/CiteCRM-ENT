<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(CAN_EDIT);
require_once(CLASS_PATH."/core/user.class.php");
$userObj = new user();

if(isset($_POST['submit'])){

	$user_id = $_POST['user_id'];
	$password = md5($_POST['user_password']);

	$userObj->reset_password($user_id, $password);

} else {
	$smarty->display('user/ajax_edit_password.tpl');

}

?>