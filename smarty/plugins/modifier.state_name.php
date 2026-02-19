<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   country_name modifier plugin
 *
 * Type:     modifier<br>
 * Name:     country_name<br>
 * Purpose:  convert country_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_state_name($string) {



	require_once(CLASS_PATH."/core/state.class.php");
	
	$state = new state();
	
	$state->view_state($string);
	
	$string = $state->get_state_text();
	
	return $string;


}