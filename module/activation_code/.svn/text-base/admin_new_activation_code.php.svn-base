<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     adminNewActivationCode.php<br>
 * Purpose:  Creates A new Activation Code for User<br>
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

$user->loadUserByID($_REQUEST['user_id']);

if(!$user->generateNewActivationCode()) {

	$core->force_page('index.php?page=user:adminViewUserDetail&userID='.$_REQUEST['user_id'].'&msg=Could Not Create Activation Code');

} else {

	$core->force_page('index.php?page=user:adminViewUserDetail&userID='.$_REQUEST['user_id'].'&msg=New Activation Code Created');
}


?>