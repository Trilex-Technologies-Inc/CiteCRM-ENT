<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(SUPER_USER);
require_once(CLASS_PATH."/core/operating_system.class.php");
$operatingObj = new operating_system();

$operating_system_manufacture_id = $_POST['operating_system_manufacture_id'];

$opreating_system_array = $operatingObj->load_by_operating_system_manufacture_id($operating_system_manufacture_id);

$smarty->assign('opreating_system_array',$opreating_system_array);

$smarty->display('operating_system_manufacture/ajax_load_operating_system.tpl');


?>