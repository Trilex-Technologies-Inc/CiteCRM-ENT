<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_workorder.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();


require_once(CLASS_PATH."/core/invoice.class.php");
require_once(CLASS_PATH."/core/payment.class.php");
require_once(CLASS_PATH."/core/cc_payment.class.php");

$invoice_id     = $_POST['invoice_id'];
$payment_type   = 1;

$invoiceObj     = new Invoice();
$paymentObj     = new Payment();
$ccPaymentObj   = new cc_payment();


$invoiceObj->view_invoice($invoice_id);

$paymentObj->load_payment_by_invoice($invoice_id,$payment_type);

// Setup CC options
$cc_payment_amount          = $paymentObj->get_cc_payment_amount();    
$cc_payment_number          = $paymentObj->decrypt($paymentObj->get_cc_payment_number());
$cc_payment_expirdate       = $paymentObj->get_cc_payment_expirdate();
$cc_payment_billing_attempt = $paymentObj->get_cc_payment_billing_attempt() + 1;


// Get Customer Inforamtion
$invoiceObj->load_company_by_invoice($invoice_id);

if($invoiceObj->fields['company_id'] > 0 ) {

    require_once(CLASS_PATH."/core/company.class.php");
    require_once(CLASS_PATH."/core/company_address.class.php");
    require_once(CLASS_PATH."/core/company_contact.class.php");


    $companyObj         = new Company();
    $companyAddressObj  = new company_address();
    $companyContactObj  = new company_contact();

    $companyAddressObj->load_by_company_id_and_type($invoiceObj->fields['company_id'],'Billing');

    $companyContactObj->load_by_company_and_type($invoiceObj->fields['company_id'],'Business Phone');



    $cust_id        = $invoiceObj->fields['company_id'];
    $first_name     = "";
    $last_name      = "";
    $display_name   = "";
    $address        = $companyAddressObj->get_company_street_1();
    $city           = $companyAddressObj->get_company_city();
    $state          = $companyAddressObj->get_company_state();
    $zip            = $companyAddressObj->get_company_postal_code();
    $country        = $companyAddressObj->get_company_country();
    $cust_email     = "";
    $cust_phone     = $companyContactObj->get_company_contact_value();

    // User
} else {

    $invoiceObj->load_user_by_invoice($invoice_id);

    require_once(CLASS_PATH."/core/user.class.php");

    $userObj = new User();
    /*
    $cust_id    = $invoiceObj->fields['user_id'];
    $first_name
    $last_name
    $display_name
    $address
    $city
    $state
    $zip
    $country
    $cust_email
    $cust_phone
    */
}


// Translat State and Country Codes
require_once(CLASS_PATH."/core/state.class.php");
require_once(CLASS_PATH."/core/country.class.php");

$stateObj   = new State();
$countyObj  = new Country();

$stateObj->view_state($state);
$state = $stateObj->get_state_text();

$countyObj->view_country($country);
$country = $countyObj->get_country_code();

// Setup Authorize Fields
$fields = $ccPaymentObj->authnet_values($cc_payment_amount,$cc_payment_number,$cc_ccv,$cc_payment_expirdate,$cust_id,$first_name,$last_name,$display_name,$address,$city,$state,$zip,$country,$cust_email,$cust_phone,$invoice_id,$inv_msg);

// Charge it
$result = $ccPaymentObj->charge_an($fields);



// Return
$msg = $ccPaymentObj->auth_return($result);

print $msg;





?>