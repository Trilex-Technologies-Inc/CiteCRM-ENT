<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_workorder.php<br>
 * Purpose:  Add New Work Order<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/workorder.class.php');

// If form Submission
if(isset($_POST['submit']) ) {

    $workorder_open_date = mktime(0,0,0,$_POST['DateMonth'],$_POST['DateDay'],$_POST['DateYear']);

    $workorder_open_date    = $workorder_open_date;
    $workorder_assigned_to  = $_POST['workorder_assigned_to'];
    $company_id             = $_POST['company_id'];
    $user_id                = $_POST['user_id'];
    $system_id              = $_POST['system_id'];
    $workorder_scope        = $core->prepare_post($_POST['workorder_scope']);
    $workorder_desription   = $core->prepare_post($_POST['workorder_desription']);
 
    $workorder = new workorder();
			
	$workorder_id = $workorder->add_workorder($workorder_open_date,$workorder_assigned_to,$company_id,$user_id,$system_id,$workorder_scope,$workorder_desription);

    $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Created Work Order #'.$workorder_id);

	$core->force_page("index.php?page=workorder:view_workorder&workorder_id=".$workorder_id);
   
} else {

    $smarty->assign('company_id', $_REQUEST['company_id']);
    $smarty->assign('user_id', $_REQUEST['user_id']);
    $smarty->display('workorder/add_workorder_frm.tpl');
}
?>