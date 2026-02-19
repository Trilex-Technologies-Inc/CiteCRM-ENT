<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_suspension.php<br>
	* Purpose:  View a Single Suspension row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/suspension.class.php');

	$core->verifyAdmin();
	$suspension = new suspension();

$suspension->view_suspension($_REQUEST['suspension_id']);

$smarty->assign('suspension', $suspension);

$smarty->display('suspension/view_suspension.tpl');

?>