<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/calendar.class.php");

$calendarObj = new calendar();

if(isset($_GET['view_private'])) {
	$_SESSION['SESSION_VIEW_PRIVATE'] = $_GET['view_private'];
}

$smarty->assign($view_private, $_SESSION['SESSION_VIEW_PRIVATE']);


if(!empty($_GET['date'])) {
	$date = $_REQUEST['date']; 
	$day = date('d', $date);
	$month = date('m', $date);
	$year = date('Y', $date); 
} else {
	$day 	= $_GET['day'];
	$month 	= $_GET['month'];
	$year	= $_GET['year'];
	$date   = mktime(0,0,0,$month,$day,$year);
}


$smarty->assign('day',$day);
$smarty->assign('month',$month);
$smarty->assign('year',$year);


$month_start 		= mktime(0,0,0,$month, 1, $year); 
$month_name 		= date('M', $month_start); 
$month_start_day 	= date('D', $month_start); 


$smarty->assign('month_name',$month_name);

switch($month_start_day){
    case "Sun": $offset = 0; break;
    case "Mon": $offset = 1; break;
    case "Tue": $offset = 2; break;
    case "Wed": $offset = 3; break;
    case "Thu": $offset = 4; break;
    case "Fri": $offset = 5; break;
    case "Sat": $offset = 6; break;
} 

// determine how many days are in the last month.
if($month == 1){
   $num_days_last = cal_days_in_month(0, 12, ($year -1));
} else {
   $num_days_last = cal_days_in_month(0, ($month -1), $year);
} 

// determine how many days are in the current month.
$num_days_current = cal_days_in_month(0, $month, $year); 


// Build an array for the current days
// in the month
for($i = 1; $i <= $num_days_current; $i++){
    $num_days_array[] = $i;
} 


// Build an array for the number of days
// in last month
for($i = 1; $i <= $num_days_last; $i++){
    $num_days_last_array[] = $i;
} 

// If the $offset from the starting day of the
// week happens to be Sunday, $offset would be 0,
// so don't need an offset correction.
if($offset > 0){ 
	$offset_correction = array_slice($num_days_last_array, -$offset, $offset); 

	$new_count = array_merge($offset_correction, $num_days_array); 

	$offset_count = count($offset_correction);
} else { 
// The else statement is to prevent building the $offset array.

	$new_count = $num_days_array;
} 

$smarty->assign('offset_count',$offset_count);

// count how many days we have with the two
// previous arrays merged together
$current_num = count($new_count); 


// Since we will have 5 HTML table rows (TR)
// with 7 table data entries (TD)
// we need to fill in 35 TDs
// so, we will have to figure out
// how many days to appened to the end
// of the final array to make it 35 days. 
if($current_num > 35){
	$num_weeks = 6; 
	$outset = (42 - $current_num);
} elseif($current_num < 35){ 
	$num_weeks = 5;
   	$outset = (35 - $current_num);
}

if($current_num == 35){
   $num_weeks = 5;
   $outset = 0;
} 

// Outset Correction
for($i = 1; $i <= $outset; $i++){
   $new_count[] = $i;
} 

// Now let's "chunk" the $new_count array
// into weeks. Each week has 7 days
// so we will array_chunk it into 7 days.
$weeks = array_chunk($new_count, 7); 


$previous_link = "<a href=\"".ROOT_URL."/index.php?page=calendar:view_month&date=";
if($month == 1){
   $previous_link .= mktime(0,0,0,12,$day,($year -1));
} else {

   $previous_link .= mktime(0,0,0,($month -1),$day,$year);
}
$previous_link .= " &view_private=".$_SESSION['SESSION_VIEW_PRIVATE']."\"><< Prev</a>";

$next_link = "<a href=\"".ROOT_URL."/index.php?page=calendar:view_month&date=";
if($month == 12){
   $next_link .= mktime(0,0,0,1,$day,($year + 1));
} else {
   $next_link .= mktime(0,0,0,($month +1),$day,$year);
}
$next_link .= " &view_private=".$_SESSION['SESSION_VIEW_PRIVATE']."\">Next >></a>"; 



// Now we break each key of the array 
// into a week and create a new table row for each
// week with the days of that week in the table data 



$html = "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" class=\"productListing\">\n".
     "<tr>\n".
     "<td colspan=\"7\">".
     "<table align=\"center\" border=\"0\" width=\"100%\" >".
     "<tr>".
     "<td colspan=\"2\" width=\"75\" align=\"left\">$previous_link</td>\n".
     "<td colspan=\"3\" width=\"150\" align=\"center\">$month_name $year</td>\n".
     "<td colspan=\"2\" width=\"75\" align=\"right\">$next_link</td>\n".
     "</tr>\n".
     "</table>\n".
     "</td>\n".
     "<tr>\n". 

"<td class=\"productListing-heading\">S</td>
<td class=\"productListing-heading\">M</td>
<td class=\"productListing-heading\">T</td>
<td class=\"productListing-heading\">W</td>
<td class=\"productListing-heading\">T</td>
<td class=\"productListing-heading\">F</td>
<td class=\"productListing-heading\">S</td>\n".
     "</tr>\n"; 
$i = 0; 


foreach($weeks AS $week){ 

	$html .= "<tr>\n"; 

	 foreach($week as $d){ 

		

		if($i < $offset_count){	
			$new_month = $month -1;
		
			$day_link = "<a href=\"".ROOT_URL."/index.php?page=calendar:view_day&Date_Year=$year&Date_Month=$new_month&Date_Day=$d\">$d</a>";
			$html .= "<td class=\"productListing-data\" height=\"100\" valign=\"top\" width=\"100\">$day_link<br>";

			$eventArray = $calendarObj->load_events($new_month,$d,$year);
			$eventCount = 0;
			foreach($eventArray as $event) {			
				if($event->get_calendar_type() == "start") {
					if($eventCount < 4) {
                        // Need to Load the End Time
                        $calendarObj->load_calendar_end_date($event->get_calendar_id());
                        $endHour = $calendarObj->get_calendar_hour();
                        $endMin = sprintf("%02d",$calendarObj->get_calendar_min());
						$html .= " <a href=\"javascript:load_event('".$event->get_calendar_id()."','". $event->get_calendar_title() ."');\"><img src=\"images/icons/copy_16.gif\" onMouseOver=\"ddrivetip('".$core->display_names($event->get_user_id())."<br> <b>Start</b> ".$event->get_calendar_hour().":".sprintf("%02d",$event->get_calendar_min())." <br> <b>End</b> ".$endHour.":".$endMin."<br>".$event->get_calendar_title()."')\" onMouseOut=\"hideddrivetip()\" style=\"cursor:pointer\" border=\"0\" align=\"middle\"> ". $core->truncate($event->get_calendar_title(),20) ."</a><br>";
					} else {
						$html .= "<a href=\"javascript:load_day('$new_month','$d','$year','calendar_hour','ASC','1');\">View More</a>";
						break;
					}
					$eventCount++;
				}
			}			

			$html .="</td>\n";

		} 


		if(($i >= $offset_count) && ($i < ($num_weeks * 7) - $outset)){ 

			if($date == mktime(0,0,0,$month,$d,$year)){	
			
				$html .= "<td class=\"today\" height=\"100\" width=\"100\" valign=\"top\" style=\"background-color: #ECECEC;\">
				<a href=\"".ROOT_URL."/index.php?page=calendar:view_day&Date_Year=$year&Date_Month=$month&Date_Day=$d\">$d</a><br>";

				$eventArray = $calendarObj->load_events($month,$d,$year);
				$eventCount = 0;
				foreach($eventArray as $event) {
					if($event->get_calendar_type() == "start") {
						if($eventCount < 4) {
                            // Need to Load the End Time
                            $calendarObj->load_calendar_end_date($event->get_calendar_id());
                            $endHour = $calendarObj->get_calendar_hour();
                            $endMin = sprintf("%02d",$calendarObj->get_calendar_min());			
							$html .= " <a href=\"javascript:load_event('".$event->get_calendar_id()."','". $event->get_calendar_title() ."');\"><img src=\"images/icons/copy_16.gif\" onMouseOver=\"ddrivetip('".$core->display_names($event->get_user_id())."<br> <b>Start</b> ".$event->get_calendar_hour().":".sprintf("%02d",$event->get_calendar_min())." <br> <b>End</b> ".$endHour.":".$endMin."<br>".$event->get_calendar_title()."')\" onMouseOut=\"hideddrivetip()\" style=\"cursor:pointer\" border=\"0\" align=\"middle\"> ". $core->truncate($event->get_calendar_title(),20) ."</a><br>";
						} else {
							$html .= "<a href=\"javascript:load_day('$month','$d','$year','calendar_hour','ASC','1');\">View More</a>";
							break;
						}
						$eventCount++;
					}
				}	
						
				$html .="</td>\n";
			} else { 	
	
				$html .= "<td class=\"productListing-data\" height=\"100\"  width=\"100\" valign=\"top\">
					<a href=\"".ROOT_URL."/index.php?page=calendar:view_day&Date_Year=$year&Date_Month=$month&Date_Day=$d\">$d</a><br>";

				$eventArray = $calendarObj->load_events($month,$d,$year);
				$eventCount = 0;
				foreach($eventArray as $event) {
					if($event->get_calendar_type() == "start") {
						if($eventCount < 4) {
                            // Need to Load the End Time
                            $calendarObj->load_calendar_end_date($event->get_calendar_id());
                            $endHour = $calendarObj->get_calendar_hour();
                            $endMin = sprintf("%02d",$calendarObj->get_calendar_min());
							$html .= "<a href=\"javascript:load_event('".$event->get_calendar_id()."','". $event->get_calendar_title() ."');\"> <img src=\"images/icons/copy_16.gif\" onMouseOver=\"ddrivetip('".$core->display_names($event->get_user_id())."<br> <b>Start</b> ".$event->get_calendar_hour().":".sprintf("%02d", $event->get_calendar_min())." <br> <b>End</b> ".$endHour.":".$endMin."<br>".$event->get_calendar_title()."')\" onMouseOut=\"hideddrivetip()\" style=\"cursor:pointer\" border=\"0\" align=\"middle\"> ". $core->truncate($event->get_calendar_title(),20) ."</a><br>";
						} else {
							$html .= "<a href=\"javascript:load_day('$month','$d','$year','calendar_hour','ASC','1');\">View More</a>";
							break;
						}
						$eventCount++;
					}
					
				}	

				$html .= "</td>\n";
			}

		} elseif($i >= ($num_weeks * 7) - $outset) { 
			$next_month = $month +1;
			$day_link = "<a href=\"".ROOT_URL."/index.php?page=calendar:view_day&Date_Year=$year&Date_Month=$next_month&Date_Day=$d\">$d</a>";

			$html .= "<td class=\"productListing-data\" height=\"100\" width=\"100\"  valign=\"top\">$day_link<br>";
			$eventArray = $calendarObj->load_events($next_month,$d,$year);
				$eventCount = 0;
				foreach($eventArray as $event) {
					if($event->get_calendar_type() == "start") {
						if($eventCount < 4) {
                            // Need to Load the End Time
                            $calendarObj->load_calendar_end_date($event->get_calendar_id());
                            $endHour = $calendarObj->get_calendar_hour();
                            $endMin = sprintf("%02d",$calendarObj->get_calendar_min());
							$html .= "<a href=\"javascript:load_event('".$event->get_calendar_id()."','". $event->get_calendar_title() ."');\"> <img src=\"images/icons/copy_16.gif\" onMouseOver=\"ddrivetip('".$core->display_names($event->get_user_id())."<br> <b>Start</b> ".$event->get_calendar_hour().":".sprintf("%02d",$event->get_calendar_min())." <br> <b>End</b> ".$endHour.":".$endMin."<br>".$event->get_calendar_title()."')\" onMouseOut=\"hideddrivetip()\" style=\"cursor:pointer\" border=\"0\" align=\"middle\"> ". $core->truncate($event->get_calendar_title(),20) ."</a><br>";
						} else {
							$html .= "<a href=\"javascript:javascript:load_day('$month','$d','$year','calendar_hour','ASC','1');\">View More</a>";
							break;
						}
						$eventCount++;
					}
					
				}	

			$html .= "</td>\n";
		} 

		$i++;
	} 

	$html .= "</tr>\n";    
	
}				

$html .='<tr>';
$html .='</table>'; 

$smarty->assign('html',$html);

$smarty->display('calendar/view_month.tpl');
?>