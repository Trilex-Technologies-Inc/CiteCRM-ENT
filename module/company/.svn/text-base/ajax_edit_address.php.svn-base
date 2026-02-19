<?php
require_once(CLASS_PATH."/core/company_address.class.php");

$companyAddressObj = new company_address();

	



if(isset($_POST['submit'])) {
	
	$company_address_id		= $_POST['company_address_id'];
	$company_address_type	= $_POST['company_address_type'];
	$company_id				= $_POST['company_id'];
	$company_street_1		= $_POST['company_street_1'];
	$company_street_2		= $_POST['company_street_2'];
	$company_city			= $_POST['company_city'];
	$company_state			= $_POST['state_name'];
	$company_postal_code	= $_POST['company_postal_code'];
	$company_country		= DEFAULTCOUNTRY;

	$companyAddressObj->update_company_address($company_address_id,$company_address_type,$company_id,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country);

    $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Company Address Updated. Company ID #'.$company_id);

	
} else {

	$company_address_id = $_GET['company_address_id'];

	$companyAddressObj->view_company_address($company_address_id);

	$smarty->assign('companyAddressObj',$companyAddressObj);

	$smarty->display('company/ajax_edit_address.tpl');
}

?>