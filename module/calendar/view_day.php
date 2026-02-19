<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

require_once(CLASS_PATH."/core/calendar.class.php");

$calendarObj = new calendar();

if($_GET['stand_alone'] == true) {
	$smarty->assign('stand_alone', true);
} else {
	$smarty->assign('stand_alone', false);
}

$year 		= $_GET['Date_Year'];
$month 		= $_GET['Date_Month'];
$day 		= $_GET['Date_Day'];
$start_hour = $_GET['start_Hour'];
$start_min 	= $_GET['start_Minute'];
$end_hour 	= $_GET['end_Hour'];
$end_min 	= $_GET['end_Minute'];
$and		= "";

// Set start and stop hours if not set
if(empty($start_hour)){
	$start_hour = COMPANY_START_HOUR;
	$start_min 	= COMPANY_START_MIN;	
}
if(empty($end_hour)){
	$end_hour = COMPANY_END_HOUR;
	$end_min  = COMPANY_END_MIN;
}

if(isset($_GET['today'])) {
	$year 		= date("Y",time());
	$month 		= date("m",time());
	$day 		= date("d",time());

}

// Minus 1 hour
if(isset($_GET['minus_one'])) {

	$year 		= date("Y",$_GET['start']);
	$month 		= date("m",$_GET['start']);
	$day 		= date("d",$_GET['start']);
	$start_hour = date("H",$_GET['start']) -1 ;
	$start_min 	= date("i",$_GET['start']);
	$end_hour 	= date("H",$_GET['end']) -1;
	
}

// Plus One
if(isset($_GET['plus_one'])) {
	
	$year 		= date("Y",$_GET['start']);
	$month 		= date("m",$_GET['start']);
	$day 		= date("d",$_GET['start']);
	$start_hour = date("H",$_GET['start']) + 1;
	$start_min 	= date("i",$_GET['start']);
	$end_hour 	= date("H",$_GET['end']) +1;
	$end_min 	= date("i",$_GET['end']);

}

if(isset($_GET['filter'])){
	$year 		= date("Y",$_GET['start']);
	$month 		= date("m",$_GET['start']);
	$day 		= date("d",$_GET['start']);
	$start_hour = date("H",$_GET['start']);
	$start_min 	= date("i",$_GET['start']);
	$end_hour 	= date("H",$_GET['end']);
	$end_min 	= date("i",$_GET['end']);
	if($_GET['filter']!="") {
		$do_and = true;
	}
	
}


// Set Times
$start_time = mktime($start_hour,$start_min,0,$month,$day,$year);
$end_time 	= mktime($end_hour,$end_min,0,$month,$day,$year);


$smarty->assign('start_time',$start_time);
$smarty->assign('end_time',$end_time);


// Create Time Line Array
$hour_count = $start_hour;
$html = "<table cellpadding=\"3\" cellspacing=\"0\" width=\"100%\"class=\"productListing\">\n
<tr>\n
<td width=\"50\" class=\"productListing-heading\" nowrap>Employee</td>\n";
			
$end_time = mktime($end_hour,$end_min,0,$month,$day,$year);
$cur_time = mktime($start_hour,$start_min ,0,$month,$day,$year);
$min_count 	= 0;
while($cur_time < $end_time){

	$cur_time = mktime($start_hour,$min_count ,0,$month,$day,$year);
	$display_min = date("i",$cur_time);
	
	switch($display_min){
		case '15':
			$html .="<td  width=\"1\" class=\"time-heading2\"></td>";	
		break;
		case '30':
			$html .="<td  width=\"10\" class=\"time-heading2\"><center>|</center></td>";
		break;
		case '45':
			$html .="<td  width=\"1\" class=\"time-heading2\" nowrap></td>";
		break;
		default:
			$html .="<td  width=\"25\" class=\"time-heading2\">".date("H:i",$cur_time)."</td>";
		break;
	}
	
	
	

	$min_count = $min_count + 15;
}

$html .="</tr>\n";


// Load user_ids by day
require_once(CLASS_PATH."/core/user.class.php");
$user_obj = new user();

//$userArray = $calendarObj->load_users_by_day($day);
$userArray = $user_obj->load_active_employees();
array_push($userArray, "0");


foreach($userArray as $user){
	$and = "";
	$user_id = $user->fields['user_id'];
	$user_name = $user->fields['user_first_name'];
	if(empty($user_name)) {
		$user_name ='Unassigned';
	}
	

	
	$html .=
	"<tr>\n
	<td width=\"50\" class=\"productListing-heading\" nowrap>$user_name</td>\n";

	$end_time = mktime($end_hour,$end_min,0,$month,$day,$year);
	$cur_time = mktime($start_hour,$start_min ,0,$month,$day,$year);
	$min_count 	= 0;
	$loop = 0;
	while($cur_time < $end_time){
	    $and = "";
		$cur_time = mktime($start_hour,$min_count ,0,$month,$day,$year);
		$hour = date("H",$cur_time);

        if($loop == 0) {
            $and .= " AND calendar_month = " . $db->qstr($month);
            $and .= " AND calendar_year = " . $db->qstr($year);
            $and .= " AND calendar_day = " . $db->qstr($day);    
            $and .= " AND calendar_hour <= " . $db->qstr($hour);
            if($do_and) {
            	$and .= " AND calendar_event_type = " . $db->qstr($_GET['filter']);
            }
        } else {
            $and .= " AND calendar_month = " . $db->qstr($month);
            $and .= " AND calendar_year = " . $db->qstr($year);       
		    $and .= " AND calendar_day = " . $db->qstr($day);	
		    $and .= " AND calendar_hour = " . $db->qstr($hour);
		    if($do_and) {
            	$and .= " AND calendar_event_type = " . $db->qstr($_GET['filter']);
            }
        }
		// Start Time
		$calendar_array = $calendarObj->load_calendar_by_user($user_id,$and);
		$sh 		= $calendar_array[0]->fields['calendar_hour'];
		$si 		= $calendar_array[0]->fields['calendar_min'];
		$sm 		= $calendar_array[0]->fields['calendar_month'];
		$sd 		= $calendar_array[0]->fields['calendar_day'];
		$sy 		= $calendar_array[0]->fields['calendar_year'];
		$obj_type 	= $calendar_array[0]->fields['calendar_event_type'];
		$obj_id 	= $calendar_array[0]->fields['calendar_event_id'];		
		$obj_date 	= mktime($sh,$si,0,$sm,$sd,$sy);
		
		//End Time
		$calendarObj->load_calendar_end_date($calendar_array[0]->fields['calendar_id']);
		$eh 		= $calendarObj->fields['calendar_hour'];
		$ei			= $calendarObj->fields['calendar_min'];
		$em			= $calendarObj->fields['calendar_month'];
		$ed			= $calendarObj->fields['calendar_day'];
		$ey			= $calendarObj->fields['calendar_year'];
		
		$end_date 	= mktime($eh,$ei,0,$em,$ed,$ey);
		$mouse = '';		
		// Set Class
	
		
		switch($obj_type) {
			// Work Order
			case 'workorder':			
				$class="workorder-data";
				require_once(CLASS_PATH."/core/workorder.class.php");	
				$workorderObj = new workorder();	
				$workorderObj->load_company_by_workorder($obj_id);
				$company_name = $workorderObj->fields['company_name'];	
				$workorderObj->view_workorder($obj_id);		
				switch($workorderObj->get_workorder_status()){
					case '1': 
						$status = 'New';
					break; 
					case '2':
					 	$status = 'Assigned';
					break; 
					case '3':
					 	$status = 'Waiting For Parts';
					break; 
					case '4': 
						$status = 'On Hold';
					break; 
					case '5':
						$status = 'Completed';
					break; 
					case '6':
						$status = 'Suspended';
					break; 
					case '7': 
						$status ='Completed';
					break; 
					case '8':
						$status ='Waiting For Customer Aproval';
					break; 
				}
				$mouse .="<b>Account: </b> " .$company_name. "<br>";
				$mouse .="<b>Status: </b> " . $status . "<br>";
				$mouse .="<b>Scope: </b>" .$core->escape_javascript($workorderObj->get_workorder_scope())."<br>";
				$mouse .="<b>Description:</b><br>";
				$mouse .=$core->escape_javascript($workorderObj->get_workorder_desription())."<br>";
				
				$text = "<a href=\"".ROOT_URL."/index.php?page=workorder:view_workorder&workorder_id=$obj_id\" style=\"color:black;text-decoration:none;\">Workorder</a>";
			break;
			// Meeting
			case 'personal':
				$class="personal-data";
				$text = 'Personal';
				$mouse .= "<b>Subject: </b> ".$core->escape_javascript($calendar_array[0]->fields['calendar_title'])."<br>";
				$mouse .= "<b>Details:</b><br>";
				$mouse .=$core->escape_javascript($calendar_array[0]->fields['calendar_text'])."<br>";
			break;
			case 'lead meeting':
				require_once(CLASS_PATH."/core/lead_meeting.class.php");
				require_once(CLASS_PATH."/core/lead.class.php");
				require_once(CLASS_PATH."/core/company.class.php");
				
				$lead_meetingObj = new lead_meeting();
				$leadObj = new lead();
				$companyObj = new company();
				
				$lead_meetingObj->view_lead_meeting($obj_id);
				$leadObj->load_by_id($lead_meetingObj->get_lead_id());
				$companyObj->view_company($leadObj->get_company_id());
				$lead_id = $leadObj->get_lead_id();
				
				$class="lead-meeting";
				$text = "<a href=\"".ROOT_URL."/index.php?page=leads:view_lead&lead_id=$lead_id\" style=\"color:black;text-decoration:none;\">Lead Meeting</a>";
				$mouse = "<b>Lead: </b>".$companyObj->get_company_name()."<br>";
				$mouse .= "<b>Subject: </b>".$core->escape_javascript($lead_meetingObj->get_lead_meeting_subject())."<br>";
				$mouse .="<b>Details:</b><br>";
				$mouse .=$core->escape_javascript($lead_meetingObj->get_lead_meeting_text())."<br>";
			break;
			case 'lead call':
				require_once(CLASS_PATH."/core/lead_call.class.php");
				require_once(CLASS_PATH."/core/lead.class.php");
				require_once(CLASS_PATH."/core/company.class.php");
				
				$lead_callObj = new lead_call();
				$leadObj = new lead();
				$companyObj = new company();
				
				$lead_callObj->view_lead_call($obj_id);
				$leadObj->load_by_id($lead_callObj->get_lead_id());
				$companyObj->view_company($leadObj->get_company_id());
				$lead_id = $leadObj->get_lead_id();
			
			
				$class="lead-call";
				$text = "<a href=\"".ROOT_URL."/index.php?page=leads:view_lead&lead_id=$lead_id\" style=\"color:black;text-decoration:none;\">Lead Call</a>";
				$mouse = "<b>Lead: </b>".$companyObj->get_company_name()."<br>";
				$mouse .= "<b>Subject: </b>".$core->escape_javascript($lead_callObj->get_lead_call_subject())."<br>";
				$mouse .="<b>Details:</b><br>";
				$mouse .=$core->escape_javascript($lead_callObj->get_lead_call_text())."<br>";
			break;
			case 'company meeting':
				require_once(CLASS_PATH."/core/company_meeting.class.php");
				require_once(CLASS_PATH."/core/company.class.php");
				
				$meetingObj = new company_meeting();
				$companyObj = new company();
				
				$meetingObj->view_meeting($obj_id);
				$companyObj->view_company($meetingObj->get_company_meeting_id());
				$company_id = $companyObj->get_company_id();
				$class="company_meeting";
				$text = "<a href=\"".ROOT_URL."/index.php?page=company:view_company&company_id=$company_id\" style=\"color:black;text-decoration:none;\">Account Meeting</a>";
				$mouse = "<b>Account: </b>".$companyObj->get_company_name()." <br>";
				$mouse .= "<b>Subject: </b>" . $core->escape_javascript($meetingObj->get_company_meeting_subject()) ."<br>";
				$mouse .="<b>Details:</b><br>";
				$mouse .=$core->escape_javascript($meetingObj->get_company_meeting_text())."<br>";
			break;
			case 'company_call':
			
			break;
		}
		
	
        if($loop == 0 && $obj_date < $cur_time && !empty($calendar_array) && $end_date > $cur_time) {
            $mouse .="<b>Start:</b> ".date("H:i",$obj_date)." <b>End:</b> ".date("H:i",$end_date);
            $offset =  ($cur_time - $obj_date) / 60;
            $num_min = ($end_date - $obj_date) / 60;
            $colspan = ($num_min - $offset) / 15;
            $html .="<td class=\"$class\" colspan=\"$colspan\" nowrap onMouseOver=\"ddrivetip('$mouse');\" onMouseOut=\"hideddrivetip()\"><a href=\"#\" style=\"color:black;text-decoration:none;\" >Cont..</a></td>\n";
            $min_count = $min_count + ($num_min - $offset);
            $last = "yes";
        } else {

            if($obj_date == $cur_time){
    
				$mouse .="<b>Start:</b> ".date("H:i",$obj_date)." <b>End:</b> ".date("H:i",$end_date);
                $num_min = ($end_date - $obj_date) / 60;
                $colspan = $num_min / 15;
      
                $html .="<td class=\"$class\" colspan=\"$colspan\" nowrap onMouseOver=\"ddrivetip('$mouse');\" onMouseOut=\"hideddrivetip()\">$text</td>\n";

                $min_count = $min_count + $num_min;
                $end_mins = 0;
                $co_offset = 0;
                $colspan = 0;
		    } else {
		    
				    
				    switch($display_min){
					    case '15':
						    $html .="<td  width=\"1\" class=\"no-data\"></td>\n";	
					    break;
					    case '30':
						    $html .="<td  width=\"10\" class=\"no-data\"></td>\n";
					    break;
					    case '45':
						    $html .="<td  width=\"1\" class=\"no-data\" nowrap></td>\n";
					    break;
					    default:
						    $html .="<td  width=\"25\" class=\"no-data\"></td>\n";
					    break;
				    }
			    
			    
			    
			    
			    $min_count = $min_count + 15;
		    }

        }
				
		$loop++;
	}


	$html .="</tr>\n";				
}

$html .="</table>";











$smarty->assign('html',$html);

$smarty->display('calendar/view_day.tpl');

?>