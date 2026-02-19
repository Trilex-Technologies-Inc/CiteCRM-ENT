<?php

require_once(CLASS_PATH."/core/service.class.php");

$serviceObj = new service();

$serviceArray = $serviceObj->load_all();

$smarty->assign('serviceArray',$serviceArray);

$smarty->display('service/ajax_load_all.tpl');

?>