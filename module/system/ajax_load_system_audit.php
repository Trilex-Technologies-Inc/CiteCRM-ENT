<?php

/**
 * @author 
 * @copyright 2007
 */
require_once(CLASS_PATH."/core/system.class.php");
$systemObj = new system();

if(isset($_POST['submit'])){
	
}

$system_id = $_POST['system_id'];

$smarty->assign('system_id', $system_id);

$smarty->display('system/ajax_load_system_audit.tpl');



?>