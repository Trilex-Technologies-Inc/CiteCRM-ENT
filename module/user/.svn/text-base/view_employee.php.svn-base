<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/user.class.php");

$userObj = new user();

$user_id = $_GET['user_id'];

$userObj->loadUserByID($user_id);

$smarty->assign('userObj',$userObj);

$smarty->display('user/view_employee.tpl');
?>