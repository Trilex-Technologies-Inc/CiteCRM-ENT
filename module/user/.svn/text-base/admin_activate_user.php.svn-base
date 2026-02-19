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


$core->verifyAdmin();

require(CLASS_PATH."/core/user.class.php");

$activation_code 	= $_REQUEST['code'];

$user_id				=	$_REQUEST['user_id'];

$user = new user();

$user->activateUser($activation_code);

$core->force_page('index.php?page=user:admin_view_user_detail&userID='.$user_id	);

?>