<?php

$fromAddress = COMPANY_STREET_1 . " " . COMPANY_CITY . "  " . COMPANY_STATE . " " . COMPANY_POSTAL_CODE;

$toAddress = $_GET['toAddress'];

$smarty->assign('toAddress',$toAddress);

$smarty->assign('fromAddress',$fromAddress);

$smarty->display('core/map.tpl');
?>