<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/workorder_history.class.php");

$workorder_history  = new workorder_history();

$workorder_history_array = $workorder_history->load_by_workorder_id($_REQUEST['workorder_id']);

$smarty->assign('workorder_history_array',$workorder_history_array);

$smarty->display('workorder/view_workorder_history.tpl');
	

?>