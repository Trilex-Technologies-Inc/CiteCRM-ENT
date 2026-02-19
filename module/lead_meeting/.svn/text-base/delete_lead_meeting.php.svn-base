<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_lead_meeting.php<br>
	* Purpose:  delete a Single Lead Meeting row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_meeting.class.php');

	$core->verifyAdmin();

$lead_meeting = new lead_meeting();

$lead_meeting->delete_lead_meeting($_REQUEST['lead_meeting_id']);

$smarty->display('lead_meeting/delete_lead_meeting.tpl')

?>