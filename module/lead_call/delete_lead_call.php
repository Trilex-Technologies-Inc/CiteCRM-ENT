<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_lead_call.php<br>
	* Purpose:  delete a Single Lead Call row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/lead_call.class.php');

	$core->verifyAdmin();

$lead_call = new lead_call();

$lead_call->delete_lead_call($_REQUEST['lead_call_id']);

$smarty->display('lead_call/delete_lead_call.tpl')

?>