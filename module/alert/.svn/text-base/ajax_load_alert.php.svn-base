<?php
/*
 * Created on Jul 18, 2007
 */
 
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/alert.class.php");

$alertObj = new alert();

$alert_id = $_POST['alert_id'];

$user_id = $_SESSION['SESSION_USER_ID'];
 
$alertObj->load_alert_by_id($alert_id,$user_id);


$employeeArray = $alertObj->load_employees_by_alert($alert_id);

$smarty->assign('alertObj',$alertObj);

$smarty->assign('employeeArray',$employeeArray);

$smarty->display('alert/ajax_load_alert.tpl');

?>
