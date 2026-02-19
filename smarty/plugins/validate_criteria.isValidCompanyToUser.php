<?php
/** 
 * Type:     Cite CMS Validation<br>
 * Name:     isModule<br>
 * Purpose:  Checks if a module Already Exists<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
 *
 * @param string $value the value being tested
 * @param boolean $empty if field can be empty
 * @param array params validate parameter values
 * @param array formvars form var values
 */
function smarty_validate_criteria_isValidCompanyToUser($value, $empty, &$params, &$formvars) {
	
	$moduleDir = MODULE_PATH . "/" . $value;

	if(!is_dir($moduleDir) ) {
		return true;
	} else {
		return false;
	}
	
	

}

?>
