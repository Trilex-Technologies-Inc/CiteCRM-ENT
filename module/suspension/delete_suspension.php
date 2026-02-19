<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_suspension.php<br>
	* Purpose:  delete a Single Suspension row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/suspension.class.php');

	$core->verifyAdmin();

$suspension = new suspension();

$suspension->delete_suspension($_REQUEST['suspension_id']);

$smarty->display('suspension/delete_suspension.tpl')

?>