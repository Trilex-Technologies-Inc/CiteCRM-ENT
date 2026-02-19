<?php
/*
 * Created on Jul 18, 2007
 *
 */
 $core->verifyAdmin(CAN_EDIT);
 
 require_once(CLASS_PATH."/core/alert.class.php");
 
 $alertObj = new alert();
 
 $user_id = $_SESSION['SESSION_USER_ID'];
 $alert_id = $_POST['alert_id'];
 
 $alertObj->mark_read($user_id,$alert_id);
 

 
 
?>
