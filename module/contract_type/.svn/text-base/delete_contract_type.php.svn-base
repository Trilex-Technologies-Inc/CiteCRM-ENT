<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_contract_type.php<br>
* Purpose:  delete a Single Contract Type row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/contract_type.class.php');

$contract_type = new contract_type();

$contract_type->delete_contract_type($_REQUEST['contract_type_id']);

$smarty->display('contract_type/delete_contract_type.tpl')

?>