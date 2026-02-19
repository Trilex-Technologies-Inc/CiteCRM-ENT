<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   workorder_status modifier plugin
 *
 * Type:     modifier<br>
 * Name:     display_names<br>
 * Purpose:  convert A user ID to First Name Last Name
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_display_names($string) {

	require_once(CLASS_PATH."/core/user.class.php");
	
	$user = new user();
	
	$user->loadUserByID($string);
	
	$user_first_name = $user->getUserFirstName();
	
	$user_last_name = $user->getUserLastName();
	
	$string = $user_first_name ." ".$user_last_name;
	
	
    return($string);
}

?>