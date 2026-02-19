<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_state.php<br>
	* Purpose:  delete a Single State row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/state.class.php');

	$core->verifyAdmin();

$state = new state();

$state->delete_state($_REQUEST['state_id']);

$smarty->display('state/delete_state.tpl')

?>