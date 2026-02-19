<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_lead_status.php<br>
	* Purpose:  Add New Lead Status<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/lead_status.class.php');
$lead_status = new lead_status();



// If form Submission
if(isset($_POST['submit']) ) {
    $lead_status_text   = $_POST['lead_status_text'];
    $lead_status_active = $_POST['ead_status_active'];

    $lead_status_id = $lead_status->add_lead_status($lead_status_text,$lead_status_active);

} else {

	$smarty->display('lead_status/add_lead_status_frm.tpl');
}
?>