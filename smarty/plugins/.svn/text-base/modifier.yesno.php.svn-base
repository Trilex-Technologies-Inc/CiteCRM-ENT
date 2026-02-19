<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty yesno modifier plugin
 *
 * Type:     modifier<br>
 * Name:     yesno<br>
 * Purpose:  convert 1 or 0 to yes or no
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_yesno($string) {

	

	if($string == 0) {
		$string = "No";
		return $string;
	}
	
	if($string == 1) {
		$string = "Yes";
		return $string;
	}
	
    return($string);
}

?>