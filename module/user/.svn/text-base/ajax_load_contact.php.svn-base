<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_contact.php<br>
 * Purpose:  Loads a users Contact information<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin();

require(CLASS_PATH."/core/user_contact.class.php");

$contactObj = new user_contact();

if(isset($_POST['submit'])) {
	$primary_phone 		= $_POST['primary_phone'];
	$secondary_phone 	= $_POST['secondary_phone'];
	$mobile_phone 		= $_POST['mobile_phone'];
	$fax				= $_POST['fax'];
	$yahoo 				= $_POST['yahoo'];
	$msn 				= $_POST['msn'];
	$icq 				= $_POST['icq'];
	$aol 				= $_POST['aol'];
	$extension			= $_POST['extension'];
	$user_id			= $_POST['user_id'];
	
	
	
	$contactObj->clear_all($user_id);
	
	if(!empty($primary_phone)){
		$contactObj->createNewContact($user_id,'Primary Phone',$primary_phone);
	}
	if(!empty($secondary_phone)){
		$contactObj->createNewContact($user_id,'Secondary Phone',$secondary_phone);
	}
	if(!empty($mobile_phone)){
		$contactObj->createNewContact($user_id,'Mobile Phone',$mobile_phone);
	}
	if(!empty($fax)){
		$contactObj->createNewContact($user_id,'Fax',$fax);
	}
	if(!empty($extension)){
		$contactObj->createNewContact($user_id,'Extension',$extension);
	}
	if(!empty($yahoo)){
		$contactObj->createNewContact($user_id,'Yahoo IM',$yahoo);
	}
	if(!empty($msn)){
		$contactObj->createNewContact($user_id,'MSN IM',$msn);
	}
	if(!empty($aol)){
		$contactObj->createNewContact($user_id,'AOL IM',$icq);
	}
	if(!empty($icq)){
		$contactObj->createNewContact($user_id,'ICQ IM',$aol);
	}
	
} else {

	$contactArray = $contactObj->loadByUserID($_SESSION['SESSION_USER_ID']);
	
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
	if(isset($_POST['edit'])) {
		$smarty->display('user/ajax_edit_contact.tpl');
	} else {
		$smarty->display('user/ajax_load_contact.tpl');
	}
}
?>