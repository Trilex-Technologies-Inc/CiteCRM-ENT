<?php
	require_once(CLASS_PATH."/core/calendar.class.php");
	
	$calendarObj = new calendar();

	$calendar_id = $_POST['event_id'];

	$calendarObj->load_event_by_id($calendar_id);
  
	$smarty->assign('calendarObj',$calendarObj);

	$smarty->display('calendar/ajax_load_event.tpl');

	//print_r($calendarObj);

?>