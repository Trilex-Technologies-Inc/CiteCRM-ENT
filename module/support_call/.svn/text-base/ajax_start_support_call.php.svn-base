<?php
$core->verifyAdmin(CAN_CREATE);

require_once(CLASS_PATH."/core/support_call.class.php");

$support_callObj = new support_call();

if(isset($_POST['submit'])){
	
	$support_call_type 		= $_POST['support_call_type'];
	$support_call_type_id	= $_POST['support_call_type_id'];
	$support_call_enter_by	= $_SESSION['SESSION_USER_ID'];
	$support_call_start		= time();
	
	
	
} else {

	require_once(CLASS_PATH."/core/company.class.php");
	require_once(CLASS_PATH."/core/contract_to_company.class.php");
	
	$companyObj = new company();
	$company_id = $_POST['support_call_type_id']; 
	
	$companyObj->view_company($company_id);
	
	$contractObj = new contract_to_company();
	
	if($companyObj->get_company_type() == 'Contract'){
		$contractObj->load_active_by_company($company_id);
		$min_used = $contractObj->load_call_min_by_month($company_id);
		$coverd_min = $contractObj->get_contract_to_company_call_min();
		$min_left = $coverd_min - $min_used;
		
		if($min_left < 1){
			$min_left = 0;
		}
		$smarty->assign('min_used',$min_used);
		$smarty->assign('min_left',$min_left);
		$smarty->assign('contractObj',$contractObj);
		
	}
	
	$smarty->assign('companyObj',$companyObj);
	
	$smarty->display('support_call/ajax_start_support_call.tpl');
}




?>