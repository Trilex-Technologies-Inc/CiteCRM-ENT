<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     adminViewUserDetail.php<br>
 * Purpose:  Displays a users detailed information<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/user.class.php");

require_once(CLASS_PATH."/core/user_to_company.class.php");

$userObj = new user();

$user_to_companyObj = new user_to_company();
	
$user_id = $_REQUEST['userID'];
	
$userObj->loadUserByID($user_id);

$user_to_companyObj->load_company_by_user($user_id);

$smarty->assign('userObj', $userObj);
		
$smarty->assign('user_to_companyObj',$user_to_companyObj);	

$smarty->display('user/admin_view_user_detail.tpl');
?>