<?php
$company_id	= $_REQUEST['company_id'];


$type = 'Service';

if(isset($_POST['submit'])) {



	require_once(CLASS_PATH.'/core/user_to_company.class.php');
	require_once(CLASS_PATH.'/core/user.class.php');
	require_once(CLASS_PATH.'/core/user_contact.class.php');
    require_once(CLASS_PATH."/core/company_address.class.php");

	$company_address_obj 	= new company_address();
	$userObj 				= new User();
	$user_to_company 		= new user_to_company();
	$user_contactObj		= new user_contact();
			
	$user_type_id			= $_POST['user_type_id'];
	$user_admin				= '0';
	$user_status			= 'Active';
	$user_username			= '';
	$user_password			= '';
	$user_first_name		= $_POST['user_first_name'];
	$user_last_name			= $_POST['user_last_name'];
	$user_email				= $_POST['user_email'];
	$user_create_date		= time();
	$user_activation_date	= time();


	$user_extension			= $_POST['user_extension'];

    $company_address_id     = $_POST['company_address_id'];

	$user_id = $userObj->add_user($user_type_id,$user_admin,$user_status,$user_username,$user_password,$user_first_name,$user_last_name,$user_email,$user_create_date,$user_activation_date);

	$user_to_company->add_user_to_company($user_id,$company_id);

	// Primary Phone
	if(!empty($_POST['primary_phone']) ) {
		$contact_type = 'Primary Phone';
		$contact_value = $_POST['primary_phone'];
		$user_contactObj->createNewContact($user_id,$contact_type,$contact_value);
	}

    // Mobile Phone
    if(!empty($_POST['mobile_phone'])) {
		$contact_type = 'Mobile Phone';
		$contact_value = $_POST['mobile_phone'];
		$user_contactObj->createNewContact($user_id,$contact_type,$contact_value);
	}

    // Other Phone
    if(!empty($_POST['secondary_phone'])) {
		$contact_type = 'Secondary Phone';
		$contact_value = $_POST['secondary_phone'];
		$user_contactObj->createNewContact($user_id,$contact_type,$contact_value);
	}

	if(!empty($user_extension)) {
		$contact_type = 'Extension';
		$contact_value = $user_extension;
		$user_contactObj->createNewContact($user_id,$contact_type,$contact_value);
	}

    // Address
    if(!empty($company_address_id)) {
        $company_address_obj->add_company_address_to_user($user_id,$company_address_id);   
    }

} else {

    require_once(CLASS_PATH."/core/company_address.class.php");

	$company_address_obj 	= new company_address();


	$company_address_obj->load_by_company_id_and_type($company_id,$type);

	$smarty->assign('company_address_obj',$company_address_obj);

    $smarty->assign('company_id',$company_id);

	$smarty->display('company/ajax_new_contact.tpl');
}
?>