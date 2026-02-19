<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/company.class.php");

$company_id = $_REQUEST['company_id'];

$companyObj = new company();

if(isset($_POST['submit'])) {

	$company_id = $_POST['company_id'];
	$company_name = $_POST['company_name'];
	$company_website = $_POST['company_website'];
	$company_assgned_to = $_POST['company_assgned_to'];
	$company_active = $_POST['company_active'];	
	
	$companyObj->update_company($company_id,$company_name,$company_website,$company_assgned_to,$company_active);

    $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Company Details Updated. Company ID #'.$company_id);

} else {

	$companyObj->view_company($company_id);

	$smarty->assign('companyObj',$companyObj);
		
	$smarty->display('company/ajax_edit_company_details.tpl');
}
?>