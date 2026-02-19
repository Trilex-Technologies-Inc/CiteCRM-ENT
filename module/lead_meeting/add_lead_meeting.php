<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_lead_meeting.php<br>
	* Purpose:  Add New Lead Meeting<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/lead_meeting.class.php');
$lead_meeting = new lead_meeting();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new lead_meeting
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$lead_meeting_id = $lead_meeting->add_lead_meeting($_REQUEST);
			$core->force_page("index.php?page=lead_meeting:view_lead_meeting&lead_meeting_id=".$lead_meeting_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('lead_meeting/add_lead_meeting_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_lead_meeting_frm');
	$smarty->display('lead_meeting/add_lead_meeting_frm.tpl');
}
?>