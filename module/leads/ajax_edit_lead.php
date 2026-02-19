<?php
$core->verifyAdmin(CAN_READ);

$lead_id = $_REQUEST['lead_id'];

require_once(CLASS_PATH."/core/lead.class.php");
require_once(CLASS_PATH."/core/company.class.php");
require_once(CLASS_PATH."/core/company_address.class.php");
require_once(CLASS_PATH."/core/company_contact.class.php");

$leadObj 			= new lead();
$companyObj			= new company();
$companyAddressObj 	= new company_address();
$companyContactObj	= new company_contact();

if(isset($_POST['submit'])) {

	// Update Lead
	$lead_id			= $_POST['lead_id'];
	$lead_type_id	    = $_POST['lead_type_id'];
	$lead_status_id		= $_POST['lead_status_id'];
	$lead_assigned_user	= $_POST['lead_assigned_user'];
	$lead_referer		= $_POST['lead_referer'];
	$lead_campaign		= $_POST['campaign_type_id'];

	$leadObj->update_lead($lead_id,$lead_type_id,$lead_status_id,$lead_assigned_user,$lead_referer,$lead_campaign);

	// Update Company
	$company_id				= $_POST['company_id'];
	$company_name			= $_POST['company_name'];
	$company_active		    = '0';

	$companyObj->update_company($company_id,$company_name,$company_website,$lead_assigned_user,$company_active);
	
	// Update Company Address
	$company_address_id	   = $_POST['company_address_id'];
	$company_street_1		= $_POST['company_street_1'];
	$company_street_2		= $_POST['company_street_2'];
	$company_city			= $_POST['company_city'];
	$company_state			= $_POST['state_id'];
	$company_postal_code	= $_POST['company_postal_code'];
	$company_country		= $_POST['company_country'];

	if($company_address_id > 0) {
		$company_address_type = 'Service';
		$companyAddressObj->update_company_address($company_address_id,$company_address_type,$company_id,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country);
	} else {
		$company_address_type = 'Service';
		$companyAddressObj->add_company_address($company_id,$company_address_type,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country);
	}

	
	// Phone
	$company_contact_type	= 'Business Phone';
	$companyContactObj->load_by_company_and_type($company_id,$company_contact_type);
	if($companyContactObj->get_company_contact_id() > 0) {
		$company_contact_value	= $_POST['business_phone'];
		$companyContactObj->update_company_contact($company_id,$company_contact_type,$company_contact_value);
	} else {
		$company_contact_value = $_POST['business_phone'];
		$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);
	}
	 
	// Fax
	$company_contact_type	= 'Business Fax';
	$companyContactObj->load_by_company_and_type($company_id,$company_contact_type);

	if($companyContactObj->get_company_contact_id() > 0) {	
		$company_contact_value	= $_POST['business_fax'];
		$companyContactObj->update_company_contact($company_id,$company_contact_type,$company_contact_value);
	} else {
		$company_contact_value= $_POST['fax_npa'].$_POST['fax_nnx'].$_POST['fax_line'];
		$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);
	}
	
	// Email
	$company_contact_type	= 'Email';
	$companyContactObj->load_by_company_and_type($company_id,$company_contact_type);
	if($companyContactObj->get_company_contact_id() > 0) {
		$company_contact_value	= $_POST['company_email'];
		$companyContactObj->update_company_contact($company_id,$company_contact_type,$company_contact_value);
	} else {
		$company_contact_value	= $_POST['company_email'];
		$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);
	}
	
	// Contact
	$company_contact_type	= 'Contact Name';
	$companyContactObj->load_by_company_and_type($company_id,$company_contact_type);
	if($companyContactObj->get_company_contact_id() > 0) {
		$company_contact_value	= $_POST['company_contact'];
		$companyContactObj->update_company_contact($company_id,$company_contact_type,$company_contact_value);
	} else {
		$company_contact_value	= $_POST['company_contact'];
		$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);
	}


     $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Edit Lead ID #'.$lead_id);

} else {
	

	$leadObj->load_by_id($lead_id);

	// Load Company
	$companyObj->view_company($leadObj->get_company_id());
	
	// Load Company Address
	$companyAddressObj->load_by_company_id_and_type($companyObj->get_company_id(),'Service');
	

	// Load Company Contact
	$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Business Phone');
	$companyPhone = $companyContactObj->get_company_contact_value();

    $smarty->assign('business_phone',$companyPhone);

    // fax
	$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Business Fax');
	$companyFax = $companyContactObj->get_company_contact_value();
    $smarty->assign('business_fax',$companyFax);

    

    // emial
	$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Email');
	$company_email = $companyContactObj->get_company_contact_value();

	$companyContactObj->load_by_company_and_type($companyObj->get_company_id(),'Contact Name');
	$contact_name = $companyContactObj->get_company_contact_value();

	
	$smarty->assign('leadObj',$leadObj);
	
	$smarty->assign('companyObj',$companyObj);
	
	$smarty->assign('companyAddressObj',$companyAddressObj);

	$smarty->assign('company_email',$company_email);

	$smarty->assign('contact_name',$contact_name);

	$smarty->display('leads/ajax_edit_lead.tpl');


}


?>