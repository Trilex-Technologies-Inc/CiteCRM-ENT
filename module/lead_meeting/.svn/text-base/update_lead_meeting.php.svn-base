<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_lead_meeting.php<br>
	* Purpose:  Update a Single Lead Meeting row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/lead_meeting.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new lead_meeting
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$lead_meeting = new lead_meeting();
			$lead_meeting->update_lead_meeting($_REQUEST);
			$core->force_page("index.php?page=lead_meeting:view_lead_meeting&lead_meeting_id=".$_REQUEST['lead_meeting_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('lead_meeting/update_lead_meeting_frm.tpl');
		}
} else {
	// Display the Form

$lead_meeting = new lead_meeting();
$lead_meeting->view_lead_meeting($_REQUEST['lead_meeting_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_lead_meeting_frm');

$smarty->assign('lead_meeting',$lead_meeting);
$smarty->display('lead_meeting/update_lead_meeting_frm.tpl');
}
?>