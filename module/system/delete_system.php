<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_system.php<br>
	* Purpose:  delete a Single System row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
	$core->verifyAdmin(CAN_DELETE);
	require(CLASS_PATH.'/core/system.class.php');

	

$system = new system();

$system->delete_system($_REQUEST['system_id']);


?>