<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     userView.php<br>
 * Purpose:  Displays a single Users Details<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/user.class.php");
require_once(CLASS_PATH."/core/alert.class.php");


$user = new user();
	
$alertObj = new alert();

$user->loadUserByID($_SESSION['SESSION_USER_ID']);

$smarty->assign('user', $user);

// Load Alerts
$alertObj->load_unread_by_user($_SESSION['SESSION_USER_ID']);

if($alertObj->get_alert_id() > 0 ){
	$smarty->assign('isAlert','true');
	$smarty->assign('alertObj',$alertObj);
}


$smarty->display('user/ajax_my_home.tpl');

$core->log_action($_SESSION['SESSION_USER_ID'],'View','View My Home');
?>