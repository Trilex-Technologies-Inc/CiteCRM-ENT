<?php


if(isset($_POST['Submit'])) {
	require_once(CLASS_PATH."/core/calendar.class.php");

	$calendarObj = new calendar();

	//print_r($_POST);

	
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
	$calendar_event_type	= "personal";

	$start_id = $calendarObj->set_event($startTimeHour,$startTimeMinute,$startDateMonth,$startDateDay,$startDateYear,'start',$user_id,$calendar_title,$calendar_text,'1',$calendar_private,$calendar_event_type,'0','0');
	$end_id = $calendarObj->set_event($endTimeHour,$endTimeMinute,$endDateMonth,$endDateDay,$endDateYear,'end',$user_id,'','','1',$calendar_private,$calendar_event_type,'0',$start_id );



} else {


	$startDate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];

	$startTime 	= mktime(COMPANY_START_HOUR,COMPANY_START_MIN,0,$_POST['month'],$_POST['day'],$_POST['year']);
	
	$endTime	= mktime(COMPANY_END_HOUR,COMPANY_END_MIN,0,$_POST['month'],$_POST['day'],$_POST['year']);



	$smarty->assign('sDate', $startDate);

	$smarty->assign('startTime', $startTime);

	$smarty->assign('endTime',$endTime);

	$smarty->display('calendar/ajax_load_new_event.tpl');
}


?>