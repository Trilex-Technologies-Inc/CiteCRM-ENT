<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/user.class.php");
require_once(CLASS_PATH."/core/user_to_company.class.php");

$userObj = new user();

$user_to_companyObj = new user_to_company();

	
$user_id = $_REQUEST['user_id'];
	
$userObj->loadUserByID($user_id);


$user_to_companyObj->load_company_by_user($user_id);


$smarty->assign('userObj', $userObj);

$smarty->assign('user_to_companyObj',$user_to_companyObj);

$smarty->display('user/ajax_load_details.tpl');

?>