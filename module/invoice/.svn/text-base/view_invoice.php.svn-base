<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_invoice.php<br>
 * Purpose:  View a Single Invoice row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/invoice.class.php');

$invoice_id = $_REQUEST['invoice_id'];

$smarty->assign('invoice_id',$invoice_id);

$invoiceObj = new invoice();

// Load User Details
$invoiceObj->load_user_by_invoice($invoice_id);

if($invoiceObj->fields['user_id'] > 0){
	require_once(CLASS_PATH."/core/user.class.php");
	$userObj = new User();
} else {

	// Load Company Details
	$invoiceObj->load_company_by_invoice($invoice_id);
	
	require_once(CLASS_PATH."/core/company.class.php");
	
	require_once(CLASS_PATH."/core/company_address.class.php");
	
	$companyObj = new Company();
	
	$companyAddressObj = new Company_Address();
	
	$companyObj->view_company($invoiceObj->fields['company_id']);
	
	$companyAddressObj->load_by_company_id_and_type($invoiceObj->fields['company_id'],'Billing');

    if(empty($companyAddressObj->fields)) {
        $companyAddressObj->load_by_company_id_and_type($invoiceObj->fields['company_id'],'Service');
    }
	
  

	$smarty->assign('company','true');
	
	$smarty->assign('companyObj',$companyObj);
	
	$smarty->assign('companyAddressObj',$companyAddressObj);

}

$invoiceObj->view_invoice($invoice_id);

$smarty->assign('invoiceObj',$invoiceObj);

$smarty->display('invoice/view_invoice.tpl',$invoice_id);
?>