<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/user_address.class.php");
require_once(CLASS_PATH."/core/user_contact.class.php");
require_once(CLASS_PATH."/core/user_to_company.class.php");

$user_addressObj    = new user_address();
$user_contactObj    = new user_contact();
$user_to_companyObj =new user_to_company();

$user_id = $_POST['user_id'];

$user_to_companyObj->load_company_by_user($user_id);

$smarty->assign('user_to_companyObj',$user_to_companyObj);

// Address
if($user_to_companyObj->fields['company_id'] > 0) {

    $user_addressObj->load_company_address($user_id);

    $smarty->assign('user_addressObj',$user_addressObj);

} else {

    $address_type = $_POST['address_type'];

    $user_addressObj->loadByAddressType($address_type,$user_id);

    $smarty->assign('user_addressObj',$user_addressObj);

    $smarty->assign('address_type',$address_type);
}

// Primary Phone
$user_contactObj->load_by_user_type($user_id, 'Primary Phone');
$primary_phone  = $user_contactObj->getContactValue();
$smarty->assign('primary_phone', $primary_phone);

// Extension
$user_contactObj->load_by_user_type($user_id, 'Extension');
$extension = $user_contactObj->getContactValue();
$smarty->assign('extension', $extension);

// Mobile phone
$user_contactObj->load_by_user_type($user_id, 'Mobile Phone');
$mobile_phone = $user_contactObj->getContactValue();
$smarty->assign('mobile_phone', $mobile_phone);

// Secondary Phone
$user_contactObj->load_by_user_type($user_id, 'Secondary Phone');
$secondary_phone = $user_contactObj->getContactValue();
 $smarty->assign('secondary_phone',$secondary_phone);




$smarty->display('user_address/ajax_load_user_address.tpl');

?>