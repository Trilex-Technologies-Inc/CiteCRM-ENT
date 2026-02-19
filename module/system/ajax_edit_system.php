<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/system.class.php");

$systemObj = new system();

$system_id = $_POST['system_id'];

if(isset($_POST['submit'])) {
	
	// New Manufacture
	if($_POST['add_manufacture'] == '1'){
		require_once(CLASS_PATH."/core/system_manufacture.class.php");
		$manufactureObj = new system_manufacture();	
		$manufacture_name = $_POST['system_manufacture_id'];
		$manufacture_abrv = substr(strtoupper($manufacture_name), 0, 3);	
		$system_manufacture_id = $manufactureObj->add_system_manufacture($manufacture_abrv,$manufacture_name);
	} else {
		$system_manufacture_id  = $_POST['system_manufacture_id'];
	}
	
	
	// New operating System Manufacture
	if($_POST['add_operating_system_man'] == '1'){
		require_once(CLASS_PATH."/core/operating_system_manufacture.class.php");	
		$operating_system_manufactureObj = new operating_system_manufacture();	
		$operating_system_manufacture_name = $_POST['operating_system_manufacture_id'];
		$operating_system_manufacture_active ='1';	
		$operating_system_manufacture_id = $operating_system_manufactureObj->add_operating_system_manufacture($operating_system_manufacture_name,$operating_system_manufacture_website,$operating_system_manufacture_active);	
	} else {
		$operating_system_manufacture_id = $_POST['operating_system_manufacture_id'];
	}
	
	
	
	//New operating System
	if($_POST['add_operating_system'] == '1'){
		require_once(CLASS_PATH."/core/operating_system.class.php");
		$operating_systeObj = new operating_system();
		$operating_system_name = $_POST['opreating_system_id'];
		$operating_system_active = '1';
		$opreating_system_id = $operating_systeObj->add_operating_system($operating_system_manufacture_id,$operating_system_name,$operating_system_active);
	} else {	
		$opreating_system_id    = $_POST['opreating_system_id'];
	}

	$system_purchase_date = mktime(0,0,0,$_POST['system_purchase_dateMonth'],$_POST['system_purchase_dateDay'],$_POST['system_purchase_dateYear']);


	
	
    $system_id                       = $_POST['system_id'];
    $system_name                     = $_POST['system_name'];
    $system_serial_num               = $_POST['system_serial_num'];
    $system_host_name                = $_POST['system_host_name'];  
    $system_ip_address               = $_POST['system_ip_address'];
    $system_model_id                 = $_POST['system_model_id'];
    $system_purchase_date            = $_POST['system_purchase_date'];
    $system_purchase_price           = $_POST['system_purchase_price'];
    $system_warenty_expire_date      = $_POST['system_warenty_expire_date'];
    $system_last_service             = $_POST['system_last_service'];
    $system_active                   = $_POST['system_active'];
    $system_waranty_text             = $core->prepare_post($_POST['system_waranty_text']);

    
    $user_id = $_POST['user_id'];

    if($user_id > 0) {
        // Delete then map
        $systemObj->remove_user_map($user_id, $system_id);
        $systemObj->_map_user($system_id, $user_id);
    }

    $systemObj->update_system($system_id,$system_name,$system_serial_num,$system_host_name,$system_manufacture_id,$operating_system_manufacture_id,$operating_system_id,$system_ip_address,$system_ip_address,$system_model_id,$system_purchase_date,$system_purchase_price,$system_warenty_expire_date,$system_last_service,$system_active,$system_waranty_text);

    $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Edit System ID #'.$system_id);

} else {

    $systemObj->view_system($system_id);

    $systemObj->fields['system_waranty_text'] = $core->prepare_edit($systemObj->get_system_waranty_text());

    $company_id = $systemObj->load_company_by_system($system_id);

    $user_id = $systemObj->load_user_id_by_system($system_id);

    $smarty->assign('systemObj',$systemObj);  
  
    $smarty->assign('company_id',$company_id);

    $smarty->assign('user_id',$user_id);

    $smarty->display('system/ajax_edit_system.tpl');
}

?>