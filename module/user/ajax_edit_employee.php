<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(CAN_EDIT);
require_once(CLASS_PATH."/core/user_address.class.php");

$addressObj = new user_address();

//Address

	
if(isset($_POST['submit'])){

	$address_type			= $addressObj->getAddressType();
	$address_street 		= $_POST['address_street'];
	$address_street_2 		= $_POST['address_street_2'];
	$address_city 			= $_POST['address_city']; 
	$address_state 			= $_POST['address_state'];
	$address_postal_code 	= $_POST['address_postal_code'];
	$address_id				= $_POST['address_id'];
	$user_id				= $_POST['user_id'];
	
	if($address_id < 1){
		$addressObj->new_address('Home',$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_date_create);
	} else {
		$addressObj->editAddress($address_type,$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_id);	
	}

} else {

	$address_id = $_POST['address_id'];

	$addressObj->load_by_address_id($address_id);

	$smarty->assign('addressObj',$addressObj);
	
	$smarty->display('user/ajax_edit_employee.tpl');

}

?>