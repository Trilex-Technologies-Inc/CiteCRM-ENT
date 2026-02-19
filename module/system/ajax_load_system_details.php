<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH.'/core/system.class.php');

require_once(CLASS_PATH.'/core/bar_code.class.php');

$systemObj = new System();

$barcodeObj = new Barcode();

$system_id = $_POST['system_id'];

$systemObj->view_system($system_id);

$img = $barcodeObj->draw("SYS".$systemObj->get_system_id(), 'Code39', 'png');

$smarty->assign('system', $systemObj);

$smarty->display('system/ajax_load_system_details.tpl');
?>