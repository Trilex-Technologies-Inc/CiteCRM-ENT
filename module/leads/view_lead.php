<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/lead.class.php");


$leadObj 			= new lead();


$lead_id = $_GET['lead_id'];

$leadObj->load_by_id($lead_id);

if($leadObj->get_lead_status_id() < 4) {
	$smarty->assign('edit',true);
}

$smarty->assign('leadObj',$leadObj);


$smarty->display('leads/view_lead.tpl');

$core->log_action($_SESSION['SESSION_USER_ID'],'View','View Lead  #'.$lead_id);

?>