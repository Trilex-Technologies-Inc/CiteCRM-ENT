<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   user_type modifier plugin
 *
 * Type:     modifier<br>
 * Name:     user_type<br>
 * Purpose:  convert User Type ID to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_user_type($string) {

	require_once(CLASS_PATH."/core/user_type.class.php");
	
	$user_type = new user_type;
	
	$user_type_array = $user_type->load_all();
	
	foreach($user_type_array as $key => $val) {
	
		if( $string == $val->get_user_type_id() ) {		
			$string = $val->get_user_type_text();		
		}
	
	}
	
	
    return($string);
}

?>