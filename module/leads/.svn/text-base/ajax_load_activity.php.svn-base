<?php
$core->verifyAdmin(CAN_READ);
$lead_id = $_POST['lead_id'];

switch($_POST['activity']){

	case "Call":

		require_once(CLASS_PATH."/core/lead_call.class.php");
		$leadCallObj = new lead_call();
	
		$lead_callArray = $leadCallObj->load_by_lead_id($lead_id);

		$smarty->assign('lead_callArray', $lead_callArray);

		$smarty->display('lead_call/ajax_load_calls.tpl');

        $core->log_action($_SESSION['SESSION_USER_ID'],'Search','Search Lead Calls for Lead #'.$lead_id);

	break;

	// Meeting
	case "Meeting":
		require_once(CLASS_PATH."/core/lead_meeting.class.php");
		$leadMeetingObj = new lead_meeting();

		$lead_meetingArray = $leadMeetingObj->load_by_lead_id($lead_id);

		$smarty->assign('lead_meetingArray',$lead_meetingArray);

		$smarty->display('lead_meeting/ajax_load_meetings.tpl');
        
        $core->log_action($_SESSION['SESSION_USER_ID'],'Search','Search Lead Meetings for Lead #'.$lead_id);
	break;

	//Email
	case "Email":
		require_once(CLASS_PATH."/core/lead_email.class.php");

		$leadEmailObj 	= new lead_email();

		$lead_emailArray = $leadEmailObj->load_by_lead_id($lead_id);

		$smarty->assign('lead_emailArray',$lead_emailArray);

		$smarty->display('lead_email/ajax_load_emails.tpl');

        $core->log_action($_SESSION['SESSION_USER_ID'],'Search','Search Lead Emails for Lead #'.$lead_id);

	break;
	

}

?>