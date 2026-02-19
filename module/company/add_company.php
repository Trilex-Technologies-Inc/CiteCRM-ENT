<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_company.php<br>
 * Purpose:  Add New Company<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/company.class.php');
require(CLASS_PATH.'/core/company_address.class.php');
require(CLASS_PATH.'/core/company_contact.class.php');

$company = new Company();

// If form Submission
if(isset($_REQUEST['submit']) ) {

 

		// Save Company		
		$company_name		= $_POST['company_name'];
		$company_website	= $_POST['company_website'];
		$company_active		= $_POST['company_active'];
		$company_assgned_to	= $_POST['company_assgned_to'];
		$contract_type_id	= $_POST['contract_type_id'];
		
		$company_id = $company->add_company($company_name,$company_website,$company_active,$company_assgned_to,$contract_type_id);
						
		// Save Service Address
		$company_address 	= new Company_Address();
		
		$company_address_type	= $_POST['company_address_type'];
		$company_street_1		= $_POST['company_street_1'];
		$company_street_2		= $_POST['company_street_2'];
		$company_city			= $_POST['company_city'];
		$company_state			= $_POST['state_name'];	
		$company_postal_code	= $_POST['company_postal_code'];
		$company_country		= $_POST['company_country'];
		
		$company_address->add_company_address($company_id,$company_address_type,$company_street_1,$company_street_2,$company_city,$company_state,$company_postal_code,$company_country);		
			
		// Save Business Phone
        
        $company_contact          = new Company_Contact();
        $company_contact_type     = 'Business Phone';
        $company_contact_value    = $_POST['business_phone'];
        $company_contact->add_company_contact($company_id,$company_contact_type,$company_contact_value);
				
			
		// Fax
        $company_contact	= new Company_Contact();
        $company_contact_type		= 'Business Fax';
        $company_contact_value		= $_POST['business_fax'];
        $company_contact->add_company_contact($company_id,$company_contact_type,$company_contact_value);
	

        //Contact Name
        if(!empty($_POST['company_contact'])) {
            $company_contact	= new Company_Contact();
            $company_contact_type	= 'Contact Name';
            $company_contact_value	= $_POST['company_contact'];
            $company_contact->add_company_contact($company_id,$company_contact_type,$company_contact_value);
        }

        // Email
        if(!empty($_POST['company_email'])) {
            $company_contact	= new Company_Contact();
			$company_contact_type	= 'Email';
			$company_contact_value	= $_POST['company_email'];
			$company_contact->add_company_contact($company_id,$company_contact_type,$company_contact_value);
        }
        
        $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Created Account ID #'.$company_id);

		$core->force_page("index.php?page=company:view_company&company_id=".$company_id);
			
} else {
	// Display the Form
	
	$smarty->display('company/add_company_frm.tpl');
}
?>