<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_workorder_status.php<br>
* Purpose:  View a Single Workorder Status row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/workorder_status.class.php');

$workorder_status = new workorder_status();

$workorder_status->view_workorder_status($_REQUEST['workorder_status_id']);

$smarty->assign('workorder_status', $workorder_status);

$smarty->display('workorder_status/view_workorder_status.tpl');

?>