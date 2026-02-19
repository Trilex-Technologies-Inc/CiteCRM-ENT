<?php
$core->verifyAdmin(SUPER_ADMIN);
require_once(CLASS_PATH."/core/user.class.php");
require_once(CLASS_PATH."/core/user_address.class.php");

$user_id = $_REQUEST['user_id'];

$userObj 	= new user();
$addressObj = new user_address();

//Address
$addressObj->loadByAddressType($type="Home",$user_id);
	
if(isset($_POST['submit'])){


	$user_id 				= $_POST['user_id'];
	$first_name 			= $_POST['first_name']; 
	$last_name 				= $_POST['last_name'];
	$email 					= $_POST['email'];
	$user_type_id			= '1';
	$user_admin				= '1';
	
	$address_type			= $addressObj->getAddressType();
	$address_street 		= $_POST['address_street'];
	$address_street_2 		= $_POST['address_street_2'];
	$address_city 			= $_POST['address_city']; 
	$address_state 			= $_POST['address_state'];
	$address_postal_code 	= $_POST['address_postal_code'];
	$address_id				= $addressObj->getAddressID();
	
	$userObj->update_user($user_id,$first_name,$last_name,$user_type_id,$user_admin,$email);
	
	if($address_id < 1){
		$addressObj->new_address('Home',$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_date_create);
	} else {
		$addressObj->editAddress($address_type,$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_id);
	
	}
	
} else {
	

	$userObj->loadUserByID($user_id);

	$smarty->assign('userObj',$userObj);
	
	
	
	$smarty->assign('addressObj',$addressObj);
	
	$smarty->display('user/ajax_employee_edit.tpl');
	
	
}

?>