<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_company.php<br>
* Purpose:  delete a Single Company row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(CAN_DELETE);

require(CLASS_PATH.'/core/company.class.php');


$company = new company();

$company->delete_company($_REQUEST['company_id']);

$smarty->display('company/delete_company.tpl')

?>