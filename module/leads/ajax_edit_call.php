<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/lead_call.class.php");
require_once(CLASS_PATH."/core/calendar.class.php");

$lead_callObj = new lead_call();

$lead_call_id = $_POST['lead_call_id'];

$calendarObj = new calendar();

if(isset($_POST['submit'])) {

     


    $lead_call_id       = $_POST['lead_call_id'];
    $lead_call_subject  = $_POST['lead_call_subject'];
    $lead_call_text     = $core->prepare_post($_POST['lead_call_text']);

    $Date_Month         = $_POST['Date_Month'];
    $Date_Day           = $_POST['Date_Day'];
    $Date_Year          = $_POST['Date_Year'];
    $startHour          = $_POST['startHour'];
    $startMinute        = $_POST['startMinute'];
    $endDay             = $_POST['endDay'];
    $endMonth           = $_POST['endMonth'];
    $endYear            = $_POST['endYear'];
    $endHour            = $_POST['endHour'];
    $endMinute          = $_POST['endMinute'];
    $delete             = $_POST['do_delete'];
	$user_id			= $_POST['user_id'];
	$add_to_calendar	= $_POST['add_to_calendar'];
	
	
    if($delete == true) {

        $lead_callObj->delete_lead_call($lead_call_id);
        
        $calendarObj->delete_by_type('lead call',$lead_call_id);

        $core->log_action($_SESSION['SESSION_USER_ID'],'Delete','Delete Lead Call ID #'.$lead_call_id);

    } else {

        $lead_call_start	= mktime($startHour,$startMinute,0,$Date_Month,$Date_Day,$Date_Year);

	    $lead_call_end		= mktime($endHour,$endMinute,0,$endMonth,$endDay,$endYear);

        $lead_callObj->update_lead_call($lead_call_id,$lead_call_subject,$lead_call_text,$lead_call_start,$lead_call_end);

        $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Update Lead Call ID #'.$lead_call_id);

        
		
		// Update Start Calendar
		if($add_to_calendar == 1) {
		
	        $calendarObj->load_by_type('lead call',$lead_call_id);
	
	        $calendar_id = $calendarObj->get_calendar_id();
	
			if($calendar_id > 0) {
	
		        $calendar_private = 0;
		
		        $user_id = $user_id;
		
		        $calendarObj->update_start($calendar_id,"Lead Call #$lead_call_id " . $lead_call_subject,$lead_call_text,$calendar_private,$Date_Month,$Date_Day,$Date_Year,$startHour,$startMinute,$user_id);
		
		        // Update End Time Calendar
		        $calendarObj->load_calendar_end_date($calendar_id);
		
		        $calendar_end_id = $calendarObj->get_calendar_id();
		
		        $calendarObj->update_end($calendar_end_id,$endMonth,$endDay,$endYear,$endHour,$endMinute);
		    } else {
		    	// Add New Calendar Object
				$start_id = $calendarObj->set_event($startHour,$startMinute,$Date_Month,$Date_Day,$Date_Year,'start',$lead_call_by,"Lead Call #$lead_call_id ".$lead_call_subject,$lead_call_text,'1','0','lead call',$lead_call_id,'0');
	
				$endTime = mktime($startHour + $endHour,$startMinute + $endMinute,0,$endDay,$endDay,$endYear);
			
				$end_hour	= date("H", $endTime);
				$end_min	= date("i",$endTime);
				$end_month	= date("m",$endTime);
				$end_day	= date("d",$endTime);
				$end_year	= date("Y",$endTime);
	
				$calendarObj->set_event($end_hour,$end_min,$end_month,$end_day,$end_year,'end',$lead_call_by,"Lead Call #$lead_call_id ",$lead_call_subject,'1','0','lead call',$lead_call_id,$start_id);
		
		    }
		    
	    } else {
	    	$calendarObj->delete_by_type('lead call',$lead_call_id);
	    }
               

    }

    

} else {

	$calendarObj->load_by_type('lead call',$lead_call_id);
	
	$smarty->assign('calendarObj',$calendarObj);
	
	if($calendarObj->get_calendar_id() > 0) {
		$calendar = 1;
	} else {
		$calendar = 0;
	}
	
	$smarty->assign('calendar',$calendar);

    $lead_callObj->view_lead_call($lead_call_id);

    $lead_callObj->fields['lead_call_text'] = $core->prepare_edit($lead_callObj->get_lead_call_text());

    $smarty->assign('lead_callObj',$lead_callObj);

    $smarty->display('leads/ajax_edit_call.tpl');
}

?>