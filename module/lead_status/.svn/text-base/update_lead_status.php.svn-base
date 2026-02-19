<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_lead_status.php<br>
	* Purpose:  Update a Single Lead Status row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

$core->verifyAdmin(SUPER_USER);
	require(CLASS_PATH.'/core/lead_status.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {

    $lead_status_text    =   $_POST['lead_status_text'];
    $lead_status_active  =   $_POST['lead_status_active'];
    $lead_status_id      =   $_POST['lead_status_id'];


    $lead_status = new lead_status();
    $lead_status->update_lead_status($lead_status_text,$lead_status_active,$lead_status_id);
			
} else {
	// Display the Form

    $lead_status = new lead_status();
    $lead_status->view_lead_status($_POST['lead_status_id']);

    $smarty->assign('lead_status',$lead_status);
    $smarty->display('lead_status/update_lead_status_frm.tpl');
}
?>