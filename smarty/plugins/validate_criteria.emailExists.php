<?php


/**
 * test if a username already exists
 *
 * @param string $value the value being tested
 * @param boolean $empty if field can be empty
 * @param array params validate parameter values
 * @param array formvars form var values
 */
function smarty_validate_criteria_emailExists($value, $empty, &$params, &$formvars) {


	
	if(!user::validateEmail($value)) {
		return false;
	} else {
		return true;
	}
	

}

?>
