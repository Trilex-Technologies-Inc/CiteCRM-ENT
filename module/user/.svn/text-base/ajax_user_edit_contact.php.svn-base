<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/user_contact.class.php");

$user_contactObj = new user_contact();

if(isset($_POST['submit'])) {

    $user_id            = $_POST['user_id'];
    $primary_phone      = $_POST['primary_phone'];
    $extension          = $_POST['extension'];
    $mobile_phone       = $_POST['mobile_phone'];
    $secondary_phone    = $_POST['secondary_phone'];

    // Clear out old
    $user_contactObj->clear_all($user_id);

    if(!empty($primary_phone)) {
        $user_contactObj->createNewContact($user_id,'Primary Phone',$primary_phone);
    }
    if(!empty($extension)) {
        $user_contactObj->createNewContact($user_id,'Extension',$extension);
    }
    if(!empty($mobile_phone)) {
        $user_contactObj->createNewContact($user_id,'Mobile Phone',$mobile_phone);
    }
    if(!empty($secondary_phone)) {
         $user_contactObj->createNewContact($user_id,'Secondary Phone',$secondary_phone);
    }

    $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Edit Contact for User  ID #'.$user_id);


} else {

    $user_id = $_GET['user_id'];

    // Primary Phone
    $user_contactObj->load_by_user_type($user_id, 'Primary Phone');
    $primary_phone  = $user_contactObj->getContactValue();
    $smarty->assign('primary_phone',$primary_phone);



    // Extension
    $user_contactObj->load_by_user_type($user_id, 'Extension');
    $extension = $user_contactObj->getContactValue();
    $smarty->assign('extension', $extension);

    // Mobile phone
    $user_contactObj->load_by_user_type($user_id, 'Mobile Phone');
    $mobile_phone = $user_contactObj->getContactValue();
    $smarty->assign('mobile_phone',$mobile_phone);



    // Secondary Phone
    $user_contactObj->load_by_user_type($user_id, 'Secondary Phone');
    $secondary_phone = $user_contactObj->getContactValue();
    $smarty->assign('secondary_phone',$secondary_phone);





    $smarty->display('user/ajax_user_edit_contact.tpl');

}

?>