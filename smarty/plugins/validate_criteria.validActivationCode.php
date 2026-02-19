<?php


/**
 * test if a username already exists
 *
 * @param string $value the value being tested
 * @param boolean $empty if field can be empty
 * @param array params validate parameter values
 * @param array formvars form var values
 */
function smarty_validate_criteria_validActivationCode($value, $empty, &$params, &$formvars) {

	require_once(CLASS_PATH."/core/user.class.php");
	
	$user = new User();
	
	if(!$user->validateActivationCode($value)) {
		return false;
	} else {
		return true;
	}
	

}

?>
