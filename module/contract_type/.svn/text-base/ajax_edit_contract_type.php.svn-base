<?php
$core->verifyAdmin(SUPER_USER);

require_once(CLASS_PATH."/core/contract_type.class.php");

$contractTypeObj = new contract_type();


if(isset($_POST['submit'])) {



    $contract_type_id                        = $_POST['contract_type_id'];
	$contract_type_name                      = $_POST['contract_type_name'];
    $contract_type_text                      = $_POST['contract_type_text'];
    $contract_type_rate                      = $_POST['contract_type_rate'];
    $contract_type_term                      = $_POST['contract_type_term'];
    $contract_type_active                    = $_POST['contract_type_active'];
    $contract_type_covered_labor             = $_POST['contract_type_covered_labor'];
    $contract_type_covered_labor_rate        = $_POST['contract_type_covered_labor_rate'];
    $contract_type_non_covered_labor_rate    = $_POST['contract_type_non_covered_labor_rate'];
    $contract_type_call_min                  = $_POST['contract_type_call_min'];
    $contract_type_call_covered_rate         = $_POST['contract_type_call_covered_rate'];
    $contract_type_call_non_covered_rate     = $_POST['contract_type_call_non_covered_rate'];
    $contract_type_increament                = $_POST['contract_type_increament'];

	$contractTypeObj->update_contract_type($contract_type_id,$contract_type_name,$contract_type_text,$contract_type_rate,$contract_type_term,$contract_type_active,$contract_type_covered_labor,$contract_type_covered_labor_rate,$contract_type_non_covered_labor_rate,$contract_type_call_min,$contract_type_call_covered_rate,$contract_type_call_non_covered_rate,$contract_type_increament);

    $core->force_page('index.php?page=contract_type:ajax_edit_contract_type&contract_type_id='.$contract_type_id);

} else {

	$contract_type_id = $_GET['contract_type_id'];
	
	$contractTypeObj->view_contract_type($contract_type_id);
	
	$smarty->assign('contractTypeObj',$contractTypeObj);
	
	$smarty->display('contract_type/ajax_edit_contract_type.tpl');

}
?>