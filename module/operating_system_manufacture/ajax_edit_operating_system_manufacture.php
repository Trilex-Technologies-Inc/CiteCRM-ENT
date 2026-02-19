<?php

/**
 * @author Jaimie
 * @copyright 2007
 */
$core->verifyAdmin(SUPER_USER);
require_once(CLASS_PATH."/core/operating_system_manufacture.class.php");
$manufactureObj = new operating_system_manufacture();

if(isset($_POST['submit'])) {
	
	$operating_system_manufacture_name		= $_POST['operating_system_manufacture_name'];
	$operating_system_manufacture_website	= $_POST['operating_system_manufacture_website'];
	$operating_system_manufacture_active	= $_POST['operating_system_manufacture_active'];
	$operating_system_manufacture_id		= $_POST['operating_system_manufacture_id'];
	
	$manufactureObj->update_operating_system_manufacture($operating_system_manufacture_name,$operating_system_manufacture_website,$operating_system_manufacture_active,$operating_system_manufacture_id);

} else {
	
	$operating_system_manufacture_id = $_POST['operating_system_manufacture_id'];
	
	$manufactureObj->view_operating_system_manufacture($operating_system_manufacture_id);
	
	$smarty->assign('manufactureObj',$manufactureObj);

	$smarty->display('operating_system_manufacture/ajax_edit_operating_system_manufacture.tpl');
}

?>