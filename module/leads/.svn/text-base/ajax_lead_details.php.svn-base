<?php
$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH."/core/lead.class.php");
require_once(CLASS_PATH."/core/company.class.php");
require_once(CLASS_PATH."/core/company_address.class.php");
require_once(CLASS_PATH."/core/company_contact.class.php");

$leadObj 			= new lead();
$companyObj			= new company();
$companyAddressObj 	= new company_address();
$companyContactObj	= new company_contact();

$lead_id = $_POST['lead_id'];

$leadObj->load_by_id($lead_id);

// Load Company
$companyObj->view_company($leadObj->get_company_id());

// Load Company Address
$companyAddressObj->load_by_company_id_and_type($companyObj->get_company_id(),'Service');


// Load Company Contact
$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Business Phone');
$companyPhone = $companyContactObj->get_company_contact_value();

$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Business Fax');
$companyFax = $companyContactObj->get_company_contact_value();

$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Email');
$company_email = $companyContactObj->get_company_contact_value();

$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Contact Name');
$contact_name = $companyContactObj->get_company_contact_value();



$smarty->assign('leadObj',$leadObj);

$smarty->assign('companyObj',$companyObj);

$smarty->assign('companyAddressObj',$companyAddressObj);

$smarty->assign('companyPhone',$companyPhone);

$smarty->assign('companyFax',$companyFax);

$smarty->assign('company_email',$company_email);

$smarty->assign('contact_name',$contact_name);

$smarty->display('leads/ajax_lead_details.tpl');


?>