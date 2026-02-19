<?php
$core->verifyAdmin(CAN_CREATE);

if(isset($_POST['submit'])) {

        


			require_once(CLASS_PATH."/core/company.class.php");
			require_once(CLASS_PATH."/core/company_address.class.php");
			require_once(CLASS_PATH."/core/company_contact.class.php");
			require_once(CLASS_PATH."/core/lead.class.php");
		

			$companyObj			= new company();
			$companyAddressObj 	= new company_address();
			$companyContactObj	= new company_contact();
			$leadObj			= new lead();
		
			// Lead
			$lead_type_id					= $_POST['lead_type_id'];
			$lead_status_id					= $_POST['lead_status_id'];
			$lead_assigned_user				= $_POST['lead_assigned_user'];
			$lead_referer					= $_POST['lead_referer'];
			$lead_campaign					= $_POST['campaign_id'];
			$lead_description				= $_POST['lead_description'];
		
			// Company
			$company_name					= $_POST['company_name'];
			$company_country				= $_POST['company_country'];
			$company_street_1				= $_POST['company_street_1'];
			$company_street_2				= $_POST['company_street_2'];
			$company_city					= $_POST['company_city'];
			$company_postal_code			= $_POST['company_postal_code'];
			$company_address_type			= $_POST['company_address_type'];
			$company_state					= $_POST['state_name'];
			$company_active					= '0';

            $business_phone = $_POST['business_phone'];
		    $business_fax = $_POST['business_fax'];

			// First Create a nonactive company
			$company_id = $companyObj->add_company($company_name,$company_website,$company_active,$company_assgned_to,'Lead');
									   			   
			// Add Company Address
			$companyAddressObj->add_company_address($company_id,$company_address_type,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country);
		
			// Phone
			$company_contact_type	= 'Business Phone';
			$company_contact_value	= $business_phone;		
			$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);

			// Fax
			$company_contact_type	= 'Business Fax';
			$company_contact_value	= $business_fax;		
			$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);
			
		
			// Email
			$company_contact_type	= 'Email';
			$company_contact_value	= $_POST['company_email'];
			$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);

			// Contact
			$company_contact_type	= 'Contact Name';
			$company_contact_value	= $_POST['company_contact'];
			$companyContactObj->add_company_contact($company_id,$company_contact_type,$company_contact_value);

			// Save the lead
			$lead_id = $leadObj->add_lead($lead_assigned_user,$company_id,$lead_referer,$lead_campaign,$lead_type_id,$lead_status_id,$lead_description);

            $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Created Lead  ID #'.$lead_id);

			$core->force_page(ROOT_URL.'/index.php?page=leads:view_lead&lead_id='.$lead_id);


} else {

	$smarty->display('leads/add.tpl');


}




	
?>