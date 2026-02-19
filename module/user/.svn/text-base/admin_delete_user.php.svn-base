<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_delete_user.php<br>
 * Purpose:  Displays a users detailed information<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin();

require_once(CLASS_PATH."/core/user.class.php");

$user_id = $_REQUEST['user_id'];

$user = new user();
	
$user->loadUserByID($user_id);
	
$user->deleteUser($user_id);

$core->force_page('index.php?page=user:admin_view_all_users');

?>