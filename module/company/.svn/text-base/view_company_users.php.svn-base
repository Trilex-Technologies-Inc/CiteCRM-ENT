<?php
$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH.'/core/user.class.php');

$user = new User();

$user_array = $user->load_by_company_id($_REQUEST['company_id']);

$smarty->assign('user_array', $user_array);

$smarty->display("company/view_company_users.tpl");

?>