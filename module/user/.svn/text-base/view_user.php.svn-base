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

// Validate authentication
$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

// Set Cache ID
$my_cache_id = $_SESSION['SESSION_USER_ID'];

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {	

	print "Cache file rebuilt";
	
	$smarty->clear_cache('user/view_user.tpl',$my_cache_id);
	
	$_SESSION['CLEAR_CACHE'] = false;
	
}

$smarty->caching = false;

// If we do not have a cached file build the page
if(!$smarty->is_cached('user/view_user.tpl',$my_cache_id)) {

	// Require Classes
	require(CLASS_PATH."/core/user.class.php");
	require(CLASS_PATH."/core/user_address.class.php");
	require(CLASS_PATH."/core/user_contact.class.php");
	
	// instantiate the class
	$user 			= new user();
	
	$user_address 	= new user_address();
	
	$user_contact 	= new user_contact();
	
	
	// Load the user
	$user->loadUserByID($_SESSION['SESSION_USER_ID']);
	
	$user_address_array = $user_address->loadAddressByUserID($user->getUserID());
	
	$user_contact_array = $user_contact->loadByUserID($user->getUserID());
	
	
	// Smarty Assignment	
	$smarty->assign('user_address_array', $user_address_array);
	
	$smarty->assign('user_contact_array', $user_contact_array);
	
	$smarty->assign('user', $user);
}

// Display Page
$smarty->display('user/view_user.tpl',$my_cache_id);
?>