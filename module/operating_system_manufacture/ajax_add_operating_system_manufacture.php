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
	
	$manufactureObj->add_operating_system_manufacture($operating_system_manufacture_name,$operating_system_manufacture_website,$operating_system_manufacture_active);

} else {

	$smarty->display('operating_system_manufacture/ajax_add_operating_system_manufacture.tpl');
}

?>