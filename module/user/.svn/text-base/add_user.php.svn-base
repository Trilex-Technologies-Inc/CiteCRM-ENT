<?php
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH."/core/user.class.php");
require(CLASS_PATH."/core/user_address.class.php");
require(CLASS_PATH."/core/user_contact.class.php");

$userObj            = new user();
$user_addressObj    = new user_address();
$user_contactObj    = new user_contact();

if(isset($_REQUEST['submit']) ) {

    $user_type_id           = '2';
    $user_admin             = 0;
    $user_status            = 'Active';      
    $user_password          = $core->generatePassword();
    $user_first_name        = $_POST['user_first_name'];
    $user_last_name         = $_POST['user_last_name'];
    $user_email             = $_POST['user_email'];
    $user_create_date       = time();
    $user_activation_date   = time();

    $user_id = $userObj->add_user($user_type_id,$user_admin,$user_status,$user_username,$user_password,$user_first_name,$user_first_name,$user_last_name,$user_email,$user_create_date,$user_activation_date);

    $address_country    = $_POST['address_country'];
    $address_street     = $_POST['address_street'];
    $address_street_2   = $_POST['address_street_2'];
    $address_city       = $_POST['address_city'];
    $address_state      = $_POST['address_state'];
    $address_postal_code= $_POST['address_postal_code'];
    $address_type       = $_POST['address_type'];
    $address_date_create= time();

    $user_addressObj->new_address($address_type,$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_date_create);


    $primary_phone      = $_POST['primary_phone'];
    $secondary_phone    = $_POST['secondary_phone'];
    $mobile_phone       = $_POST['mobile_phone'];


    if(!empty($primary_phone)) {
        $contact_type   = 'Primary Phone';
        $contact_value  = $primary_phone;
        $user_contactObj->createNewContact($user_id,$contact_type,$contact_value);
    }

    if(!empty($secondary_phone)) {
        $contact_type   = 'Secondary Phone';
        $contact_value  = $secondary_phone;
        $user_contactObj->createNewContact($user_id,$contact_type,$contact_value);
    }

    if(!empty($mobile_phone)) {
        $contact_type   = 'Mobile Phone';
        $contact_value  = $mobile_phone;
        $user_contactObj->createNewContact($user_id,$contact_type,$contact_value);
    }



    $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Created User  ID #'.$user_id);

    $core->force_page(ROOT_URL.'/index.php?page=user:admin_view_user_detail&userID='.$user_id);



} else {
	// Display the Form
	$smarty->assign('company_id', $_GET['company_id']);

	$smarty->display('user/new_user_frm.tpl');


}


?>