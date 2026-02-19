<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/company_address.class.php");
require_once(CLASS_PATH."/core/company_contact.class.php");

$companyAddressObj = new company_address();

$companyContactObj	= new company_contact();

$company_id = $_REQUEST['company_id'];

$type = $_POST['company_address_type'];

$companyAddressObj->load_by_company_id_and_type($company_id,$type);

$smarty->assign('type',$type);

$smarty->assign('companyAddressObj',$companyAddressObj);

if(isset($_REQUEST['_new'])) {


	if(isset($_POST['submit'])) {

		$company_id 			= $_POST['company_id'];
		$company_address_type 	= $_POST['company_address_type'];
		$company_street_1 		= $_POST['company_street_1'];
		$company_street_2 		= $_POST['company_street_2'];
		$company_city 			= $_POST['company_city'];
		$company_state 			= $_POST['state_name'];
		$company_postal_code 	= $_POST['company_postal_code'];
		$company_country 		= DEFAULTCOUNTRY;

		$companyAddressObj->add_company_address($company_id,$company_address_type,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country);

	} else {

		$companyAddressObj->load_by_company_id_and_type($company_id,'Service');
		$smarty->assign('companyAddressObj',$companyAddressObj);
		$smarty->assign('type', $_GET['company_address_type']);
		$smarty->display('company/ajax_add_address.tpl');

	}

	

} else {

	$companyContactObj->load_by_company_and_type($company_id,'Business Phone');
	$business_phone = $companyContactObj->get_company_contact_value();

	$companyContactObj->load_by_company_and_type($company_id,'Business Fax');
	$business_fax = $companyContactObj->get_company_contact_value();

	$companyContactObj->load_by_company_and_type($company_id,'Contact Name');
	$business_contact = $companyContactObj->get_company_contact_value();

	$companyContactObj->load_by_company_and_type($company_id,'Email');
	$business_email = $companyContactObj->get_company_contact_value();
	

	$smarty->assign('business_phone',$business_phone);

	$smarty->assign('business_fax', $business_fax);

	$smarty->assign('business_contact',$business_contact);

	$smarty->assign('business_email',$business_email);
 
	$smarty->display('company/ajax_load_address.tpl');
}


?>