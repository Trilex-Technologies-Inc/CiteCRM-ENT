<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/user.class.php");

$userObj 			= new user();

$user_id = $_REQUEST['user_id'];

$userObj->loadUserByID($user_id);

$smarty->assign('userObj',$userObj);

if($userObj->getUserStatus() == 'Suspended'){
	$suspensionObj = new user();
	$suspensionObj->load_suspension($user_id);
	$smarty->assign('suspended_by',$suspensionObj->fields['user_to_suspension_by']);
	$smarty->assign('suspension_date',$suspensionObj->fields['user_to_suspension_date']); 
	$smarty->assign('suspension_reason', $core->prepare_edit($suspensionObj->fields['user_to_suspension_reaseon'])); 
}




$smarty->display('user/ajax_load_employee_details.tpl');


?>