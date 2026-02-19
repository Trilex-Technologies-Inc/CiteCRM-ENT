<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_delete_workorder_time.php<br>
 * Purpose:  View workorder Time<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_DELETE);

$workorder_time_id = $_REQUEST['workorder_time'];

require_once(CLASS_PATH."/core/workorder_time.class.php");

$workorderTimeObj = new workorder_time();

$workorderTimeObj->delete_workorder_time($workorder_time_id);

?>