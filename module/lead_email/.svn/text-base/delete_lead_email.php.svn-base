<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_lead_email.php<br>
	* Purpose:  delete a Single Lead Email row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_email.class.php');

	$core->verifyAdmin();

$lead_email = new lead_email();

$lead_email->delete_lead_email($_REQUEST['lead_email_id']);

$smarty->display('lead_email/delete_lead_email.tpl')

?>