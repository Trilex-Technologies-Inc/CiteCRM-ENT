<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_state.php<br>
	* Purpose:  View a Single State row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/state.class.php');

	$core->verifyAdmin();
	$state = new state();

$state->view_state($_REQUEST['state_id']);

$smarty->assign('state', $state);

$smarty->display('state/view_state.tpl');

?>