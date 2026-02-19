<?php
// ajax_load_employee_address.php
$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH."/core/user_address.class.php");
require_once(CLASS_PATH."/core/user_contact.class.php");

$addressObj = new user_address();
$contactObj = new user_contact();

$user_id = $_REQUEST['user_id'];


$addressObj->loadByAddressType($type="Home",$user_id);

$contactArray = $contactObj->loadByUserID($user_id);



foreach ($contactArray as $contact) {	
	if( $contact->fields['contact_type'] == 'Primary Phone') {
		$smarty->assign('primary_phone',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'Extension') {
		$smarty->assign('extension',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'Secondary Phone') {
		$smarty->assign('secondary_phone',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'Mobile Phone'){
		$smarty->assign('mobile_phone',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'Fax'){
		$smarty->assign('fax',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'Yahoo IM') {
		$smarty->assign('yahoo',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'MSN IM') {
		$smarty->assign('msn',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'AOL IM') {
		$smarty->assign('aol',$contact->fields['contact_value'] );
	}
	if($contact->fields['contact_type'] == 'ICQ IM') {
		$smarty->assign('icq',$contact->fields['contact_value'] );
	}
}


$smarty->assign('addressObj',$addressObj);	

$smarty->display('user/ajax_load_employee_address.tpl');

?>