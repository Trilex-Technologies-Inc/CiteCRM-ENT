<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_lead_status.php<br>
	* Purpose:  delete a Single Lead Status row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/lead_status.class.php');

$lead_status = new lead_status();

$lead_status->delete_lead_status($_POST['lead_status_id']);



?>