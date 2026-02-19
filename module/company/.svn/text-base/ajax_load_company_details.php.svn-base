<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/company.class.php");

$companyObj = new company();

$company_id = $_POST['company_id'];


$companyObj->view_company($company_id);

$smarty->assign('companyObj',$companyObj);

$smarty->display('company/ajax_load_company_details.tpl');

?>