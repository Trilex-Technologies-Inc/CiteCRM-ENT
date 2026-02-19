<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     adminActivateUser.php<br>
 * Purpose:  Activates A User<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH."/core/user.class.php");

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

$core->verifyAdmin();

// instantiate the class
$user 		= new user();


if($user->activateUser($_REQUEST['code'])) {

	$core->force_page("index.php?page=user:adminViewUserDetail&userID=". $_REQUEST['user_id']. "&msg=User Activated");

} else {

	$core->force_page("index.php?page=user:adminViewUserDetail&userID=". $_REQUEST['user_id']."&msg=Could not Activate User");
}
?>