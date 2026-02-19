<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/contract_to_company.class.php");
require_once(CLASS_PATH."/core/autobill.class.php");

$contractObj = new contract_to_company();

$autobillObj = new autobill();

$company_id = $_POST['company_id'];

$contractObj->load_active_by_company($company_id);

$autobillObj->load_next_bill_date($company_id);

$smarty->assign('contractObj',$contractObj);

// Labor used this month
$start_date = mktime(0,0,0,date("m"),1,date("Y"));
$end_date = mktime(0,0,0,date("m"),date("t"),date("Y"));
$labor_used = $contractObj->load_labor_hour_by_month($company_id,$start_date,$end_date);

// Min used this month
$min_used = $contractObj->load_call_min_by_month($company_id);

$smarty->assign('labor_used',$labor_used);

$smarty->assign('min_used',$min_used);

$smarty->assign('autobillObj',$autobillObj);

$smarty->display('company/ajax_load_contract.tpl');

?>