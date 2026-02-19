<?php

$core->verifyAdmin(SUPER_USER);
require(CLASS_PATH.'/core/service.class.php');
$serviceObj = new service();

if(isset($_POST['submit'])){

	$service_id 	= $_POST['service_id'];
	$service_name	= $_POST['service_name'];
	$service_amount	= $_POST['service_amount'];
	$service_active	= $_POST['service_active']; 
		
	$serviceObj->edit_service($service_id,$service_name,$service_amount,$service_active);
	
} else {

	$service_id = $_POST['service_id'];
	
	$serviceObj->view_service($service_id);
	
	$smarty->assign('serviceObj',$serviceObj);
	
	$smarty->display('service/ajax_view.tpl');
	
}



?>