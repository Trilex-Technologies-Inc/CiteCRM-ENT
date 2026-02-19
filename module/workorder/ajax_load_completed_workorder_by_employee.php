<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_completed_workorder_by_employee.php<br>
 * Purpose:  View workorders assigned to user<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/workorder.class.php");

$user_id = $_REQUEST['user_id'];

$workorder				= new Workorder();

$workorder_array = $workorder->load_completed_by_employee($user_id);

$smarty->assign('workorder_array', $workorder_array);

$smarty->assign('workorder_status', 'Completed');

$smarty->display('workorder/ajax_load_completed_workorder_by_employee.tpl');
?>