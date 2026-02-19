<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/lead_meeting.class.php");
require_once(CLASS_PATH."/core/calendar.class.php");

$lead_meetingObj = new lead_meeting();

$lead_meeting_id = $_POST['lead_meeting_id'];

$calendarObj    = new calendar();
    
if(isset($_POST['submit'])) {

    

	$startMonth		= $_POST['startMonth'];
	$startDay		= $_POST['startDay'];
	$startYear		= $_POST['startYear'];
	$startHour		= $_POST['startHour'];
	$startMinute	= $_POST['startMinute'];

	$endMonth		= $_POST['endMonth'];
	$endDay			= $_POST['endDay'];
	$endYear		= $_POST['endYear'];
	$endHour		= $_POST['endHour'];
	$endMinute		= $_POST['endMinute'];

	$user_id		= $_POST['user_id'];

	$lead_meeting_start		= mktime($startHour,$startMinute,0,$startMonth,$startDay,$startYear);
	$lead_meeting_end		= mktime($endHour,$endMinute,0,$endMonth,$endDay,$endYear);

	$lead_meeting_subject	= $_POST['lead_meeting_subject'];
    $lead_meeting_text      = $core->prepare_post($_POST['lead_meeting_text']);

    $do_delete = $_POST['do_delete'];

    if($do_delete) {

        $lead_meetingObj ->delete_lead_meeting($lead_meeting_id);

        $calendarObj->load_by_type('lead meeting',$lead_meeting_id);

        $calendar_id = $calendarObj->get_calendar_id();

        $calendarObj->set_inactive($calendar_id);

         // record Log
        $core->log_action($_SESSION['SESSION_USER_ID'],'Delete','Delete Lead Meeting ID #'.$lead_meeting_id);

    } else {

        $lead_meetingObj->update_lead_meeting($lead_meeting_id,$lead_meeting_start,$lead_meeting_end,$lead_meeting_subject,$lead_meeting_text);

        // Update Start Calendar
        $calendarObj->load_by_type('lead meeting',$lead_meeting_id);

        $calendar_id = $calendarObj->get_calendar_id();
        $calendar_private = 0;
        $user_id = $user_id;

        $calendarObj->update_start($calendar_id,$lead_meeting_subject,$lead_meeting_text,$calendar_private,$startMonth,$startDay,$startYear,$startHour,$startMinute,$user_id);

        // Update End Time Calendar
        $calendarObj->load_calendar_end_date($calendar_id);
        $calendar_end_id = $calendarObj->get_calendar_id();

        $calendarObj->update_end($calendar_end_id,$endMonth,$endDay,$endYear,$endHour,$endMinute);

        // record Log
        $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Update Lead Meeting ID #'.$lead_meeting_id);
    }


} else {

	$calendarObj->load_by_type('lead meeting',$lead_meeting_id);
	
	$smarty->assign('calendarObj',$calendarObj);

    $lead_meetingObj->view_lead_meeting($lead_meeting_id);

    $lead_meetingObj->fields['lead_meeting_text'] = $core->prepare_edit($lead_meetingObj->get_lead_meeting_text());

    $smarty->assign('lead_meetingObj',$lead_meetingObj);

    $smarty->display('leads/ajax_edit_meeting.tpl');
    
   

}

?>