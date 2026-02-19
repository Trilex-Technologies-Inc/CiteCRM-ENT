<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_new_activation_code.php<br>
 * Purpose:  Generates New Activation Code<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();

require(CLASS_PATH."/core/user.class.php");

$user = new user();

$user_id	=	$_REQUEST['user_id'];

$user->loadUserByID($user_id);

$user->generateNewActivationCode();

$_SESSION['CLEAR_CACHE'] = true;

$core->force_page('index.php?page=user:admin_view_user_detail&userID='.$user_id);


?>
