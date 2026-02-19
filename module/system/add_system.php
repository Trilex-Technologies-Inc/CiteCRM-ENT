<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_system.php<br>
	* Purpose:  Add New System<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/system.class.php');

$system = new system();

// If form Submission
if(isset($_POST['submit']) ) {

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


    $system_name            = $_POST['system_name'];
    $user_id                = $_POST['user_id'];
    $system_serial_num      = $_POST['system_serial_num'];
    $system_host_name       = $_POST['system_host_name'];
    $system_ip_address      = $_POST['system_ip_address'];   
    $system_model_id        = $_POST['system_model_id'];   
    $system_purchase_price  = $_POST['system_purchase_price'];
    $system_waranty_text    = $_POST['system_waranty_text'];
    $system_last_service    = $_POST['system_last_service'];
    $system_warenty_expire_date = $_POST['system_warenty_expire_date'];
    $company_id             = $_POST['company_id'];

    $system_id = $system->add_system($system_name,$user_id,$system_serial_num,$system_host_name,$system_ip_address,$system_manufacture_id,$system_model_id,$system_model_id,$operating_system_manufacture_id,$opreating_system_id,$system_purchase_date,$system_purchase_price,$system_waranty_text,$system_warenty_expire_date,$system_last_service,$company_id);
			
    $core->force_page("index.php?page=system:view_system&system_id=".$system_id);
			

} else {
	// Display the Form

	$smarty->display('system/add_system_frm.tpl');
}
?>