<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

require_once(CLASS_PATH."/core/company_meeting.class.php");
require_once(CLASS_PATH."/core/calendar.class.php");
$meetingObj = new company_meeting();
if($_POST['submit']){

	
	$calendarObj    = new calendar();

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

	$company_meeting_start		= mktime($startHour,$startMinute,0,$startMonth,$startDay,$startYear);
	$company_meeting_end		= mktime($endHour,$endMinute,0,$endMonth,$endDay,$endYear);

	$company_id					= $_POST['company_id'];
	$company_meeting_subject	= $_POST['company_meeting_subject'];
    $company_meeting_text      	= $core->prepare_post($_POST['company_meeting_text']);
	$company_meeting_active		= $_POST['company_meeting_active'];

    $company_meeting_by         = $user_id;

	$company_meeting_id = $meetingObj->add_company_meeting($company_id,$company_meeting_subject,$company_meeting_text,$company_meeting_start,$company_meeting_end,$company_meeting_active);

    // Set Calendar
    $start_id = $calendarObj->set_event($startHour,$startMinute,$startMonth,$startDay,$startYear,'start',$company_meeting_by,$company_meeting_subject,$company_meeting_text,'1','0','company meeting',$company_id,'0');

    $calendarObj->set_event($endHour,$endMinute,$endMonth,$endDay,$endYear,'end',$company_meeting_by,"Company Meeting $company_meeting_id",$company_meeting_subject,'1','0','company meeting',$company_id,$start_id);

    // Log
    $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Created Meeting Meeting ID #'.$company_meeting_id);
} else {
	
	$smarty->display('company_meeting/ajax_new_meeting.tpl');
}	

?>