<?php
$core->verifyAdmin(CAN_EDIT);
require_once(CLASS_PATH."/core/company_contact.class.php");
$company_id = $_REQUEST['company_id'];
$company_contactObj = new company_contact();
if(isset($_POST['submit'])) {
	$company_contactObj->clear_all($company_id);

	if(!empty($_POST['business_contact'])) {
		$company_contactObj->add_company_contact($company_id,'Contact Name',$_POST['business_contact']);
	}

	if(!empty($_POST['business_phone'])){
        $phone = $_POST['business_phone'];
		$company_contactObj->add_company_contact($company_id,'Business Phone',$phone);
	}

	if(!empty($_POST['business_fax'])) {

        $fax = $_POST['business_fax'];
		$company_contactObj->add_company_contact($company_id,'Business Fax',$fax);
	}

	if(!empty($_POST['business_email'])) {
		$company_contactObj->add_company_contact($company_id,'Email',$_POST['business_email']);
	}

    $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Update Contact Information for Account ID #'.$company_id);

} else {
    // Contact Name
	$company_contactObj->load_by_company_and_type($company_id,'Contact Name');
	$business_contact = $company_contactObj->get_company_contact_value();	
	$smarty->assign('business_contact',$business_contact);

    // Primary Phone
	$company_contactObj->load_by_company_and_type($company_id,'Business Phone');
	$companyPhone = $company_contactObj->get_company_contact_value();
    $smarty->assign('business_phone',$companyPhone);
    	

    // fax
	$company_contactObj->load_by_company_and_type($company_id,'Business Fax');
	$companyFax = $company_contactObj->get_company_contact_value();
	$smarty->assign('business_fax',$companyFax);
   

    // Email
	$company_contactObj->load_by_company_and_type($company_id,'Email');
	$business_email = $company_contactObj->get_company_contact_value();
	$smarty->assign('business_email', $business_email);
	$smarty->display('company/ajax_edit_company_contact.tpl');
}
?>