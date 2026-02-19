<?php
require_once(CLASS_PATH."/core/user.class.php");

$userObj = new user();

$user_type_id = EMPLOYEE_TYPE_ID;


$userArray = $userObj->load_by_type_id($user_type_id);

$smarty->assign('userArray',$userArray);

$smarty->display('user/ajax_user_select_load.tpl');

?>