<?php

/**
 * @author 
 * @copyright 2007
 */
$core->verifyAdmin(CAN_EDIT);	

if(isset($_POST['submit'])){
	require_once(CLASS_PATH."/core/service.class.php");
	require_once(CLASS_PATH."/core/workorder_service.class.php");
	
	$serviceObj = new service();
	$workorder_serviceObj = new workorder_service();
	
	
	$workorder_id	= $_POST['workorder_id'];
	$service_qty	= $_POST['service_qty'];
	$service_id		= $_POST['service_id'];
	
	$serviceObj->view_service($service_id);
	
	$service_amount = $serviceObj->get_service_amount();
	
	$sub_total = $service_qty * $service_amount;
	
	$workorder_service_description = $serviceObj->get_service_name();
	
	$workorder_serviceObj->add_workorder_service($workorder_id,$service_qty,$workorder_service_description,$service_amount,$sub_total);
	
	
	
} else {
	
	$smarty->display('workorder/ajax_add_workorder_service.tpl');
}


?>