<?php
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/workorder.class.php');

$workorderObj = new workorder();

$workorder_id = $_REQUEST['workorder_id'];

$workorderObj->load_workorder_info($workorder_id);

$smarty->assign('workorderObj',$workorderObj);

$smarty->display('workorder/ajax_load_workorder_info.tpl');

?>