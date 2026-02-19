<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_contract_type.php<br>
* Purpose:  Search Contract Type<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

$smarty->display('contract_type/search_contract_type.tpl');

?>