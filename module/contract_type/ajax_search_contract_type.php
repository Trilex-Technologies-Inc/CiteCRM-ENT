<?php
require(CLASS_PATH.'/core/contract_type.class.php');
	
$contract_type = new contract_type();

$contract_typeArray = $contract_type->search_contract_type();

$smarty->assign('contract_typeArray', $contract_typeArray);


$smarty->display('contract_type/ajax_search_contract_type.tpl');
?>