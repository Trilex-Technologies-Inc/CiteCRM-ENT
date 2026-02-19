<?php

/**
 * @author Jaimie
 * @copyright 2007
 */
$core->verifyAdmin(CAN_CREATE);

require_once(CLASS_PATH."/core/system_manufacture.class.php");
$manufactureObj = new system_manufacture ();


if(isset($_POST['submit'])) {
	$manufacture_name		= $_POST['manufacture_name'];
	$manufacture_abrv		= $_POST['manufacture_abrv'];
    $system_manufacture_id	= $_POST['system_manufacture_id'];
    
    $manufactureObj->add_system_manufacture($manufacture_abrv,$manufacture_name);

} else {
	$smarty->display('system_manufacture/ajax_add_system_manufacture.tpl');
}

?>