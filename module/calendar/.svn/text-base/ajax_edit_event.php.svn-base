<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/calendar.class.php");

$calendarObj = new calendar();

$calendar_id = $_POST['calendar_id'];

if(isset($_POST['submit'])) {

    $calendar_id            = $_POST["calendar_id"];
    $calendar_title			= $_POST["calendar_title"];
	$calendar_text			= $core->prepare_post($_POST["calendar_text"]);
	$calendar_private		= $_POST["calendar_private"];

	$startDateMonth			= $_POST["startDateMonth"];
	$startDateDay			= $_POST["startDateDay"];
	$startDateYear			= $_POST["startDateYear"];
	$startTimeHour			= $_POST["startTimeHour"];
	$startTimeMinute		= $_POST["startTimeMinute"];
	
	$endDateMonth			= $_POST["endDateMonth"];
	$endDateDay				= $_POST["endDateDay"];
	$endDateYear			= $_POST["endDateYear"];
	$endTimeHour			= $_POST["endTimeHour"];
	$endTimeMinute			= $_POST["endTimeMinute"];

	$user_id				= $_POST['user_id'];

    $delete                 = $_POST['do_delete'];


    if($delete == true) {

        $calendarObj->set_inactive($calendar_id);

    } else {

        $calendarObj->update_start($calendar_id,$calendar_title,$calendar_text,$calendar_private,$startDateMonth,$startDateDay,$startDateYear,$startTimeHour,$startTimeMinute,$user_id);

        $calendarObj->load_calendar_end_date($calendar_id);

        $calendar_end_id = $calendarObj->get_calendar_id();

        $calendarObj->update_end($calendar_end_id,$endDateMonth,$endDateDay,$endDateYear,$endTimeHour,$endTimeMinute);
    }

} else {

    $calendarObj->load_calendar_end_date($calendar_id);

    $endMonth = $calendarObj->get_calendar_month();

    $endDay = $calendarObj->get_calendar_day();

    $endYear = $calendarObj->get_calendar_year();

    $endHour = $calendarObj->get_calendar_hour();

    $endMin = $calendarObj->get_calendar_min();

    $endTime = mktime($endHour,$endMin,0,$endMonth,$endDay,$endYear);

    $smarty->assign('endTime',$endTime);
    


    // Load Calendar
    $calendarObj->view_calendar($calendar_id);

    $calendarObj->fields['calendar_text'] = $core->prepare_edit($calendarObj->get_calendar_text());

    $smarty->assign('calendarObj',$calendarObj);

    $startTime = mktime($calendarObj->get_calendar_hour(),$calendarObj->get_calendar_min(),0,$calendarObj->get_calendar_month(),$calendarObj->get_calendar_day(),$calendarObj->get_calendar_year()); 

    $smarty->assign('startTime',$startTime);

    $smarty->display('calendar/ajax_edit_event.tpl');
}
?>