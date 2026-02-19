<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_function_html_select_task_due($params, &$smarty) {
	
	
	
	if(isset($params['time'])){
		$month 			= date("m",$params['time']);
		$year 			= date("Y",$params['time']);
		$day			= date("d",$params['time']);
		$current_hour 	= date("g",$params['time']);
		$am_pm			= date("H",$params['time']);
		if($am_pm > 11){
			$am_pm = "PM";
		} else {
			$am_pm = "AM";	
		}
		
		$html = "<input name=\"due_type\" type=\"radio\" value=\"1\" checked>";
	}else{
		$month 			= date("m");
		$year 			= date("Y");
		$day			= date("d");
		$current_hour 	= date("g");
		$html = "<input name=\"due_type\" type=\"radio\" value=\"1\">";
	}
	
	
	$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
	
	
	$html .="<select id=\"due_day\" name=\"due_day\" onchange=\"document.task.due_type[1].checked = true;\">";
	
	//Select Days
	$day_count = 1;
	$num_days  = $num_days + 1;
	while($day_count < $num_days){
		$html .="<option value=\"$day_count\"";
		if($day_count == $day){
			$html .=" selected ";
		}
		$html .=">".$day_count."</option>";
		$day_count++;
	}
	
	$html .="</select>";
	
	// Select Month
	$month_count = 1;
	$num_months = 13;
	$html .="<select id=\"due_month\" name=\"due_month\" onchange=\"document.task.due_type[1].checked = true;\">";
	$html .="<option value=\"1\"";if($month == 1) $html .=" selected "; $html.=">January</option>";
	$html .="<option value=\"2\"";if($month == 2) $html .=" selected "; $html.="  >February</option>";
	$html .="<option value=\"3\"";if($month == 3) $html .=" selected "; $html.="  >March</option>";
	$html .="<option value=\"4\"";if($month == 4) $html .=" selected "; $html.="  >April</option>";
	$html .="<option value=\"5\"";if($month == 5) $html .=" selected "; $html.="  >May</option>";
	$html .="<option value=\"6\"";if($month == 6) $html .=" selected "; $html.="  >June</option>";
	$html .="<option value=\"7\"";if($month == 7) $html .=" selected "; $html.="  >July</option>";
	$html .="<option value=\"8\"";if($month == 8) $html .=" selected "; $html.="  >August</option>";
	$html .="<option value=\"9\"";if($month == 9) $html .=" selected "; $html.=" >September</option>";
	$html .="<option value=\"10\"";if($month == 10) $html .=" selected "; $html.=">October</option>";
	$html .="<option value=\"11\"";if($month == 11) $html .=" selected "; $html.=" >November</option>";
	$html .="<option value=\"12\"";if($month == 12) $html .=" selected "; $html.=" >December</option>";
	$html .="</select>";

	// Year
	$html .="<select id=\"due_year\" name=\"due_year\" onchange=\"document.task.due_type[1].checked = true;\">";
	$year_count = $year;
	$last_year = $year_count + 11;
	while($year_count < $last_year) {
		$html .="<option value=\"$year_count\" ";
		if($year_count == $year){
			$html .=" selected";
		}
		$html .=">$year_count</option>";
		$year_count++;
	}
	$html .="</select>";
	
	// Time
	$hour = 1;
	$html .="<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	$html .="<select name=\"due_hour\" id =\"due_hour\" onchange=\"document.task.due_type[1].checked = true;\">";
	while($hour < 13){
		$html .="<option value=\"$hour\"";
		if($hour == $current_hour){
			$html .=" selected ";
		}
		$html.=">$hour</option>";
		
		$hour++;
	}
	$html .="</select>";
	
	$html.="<select name=\"due_minute\" id =\"due_minute\" onchange=\"document.task.due_type[1].checked = true;\">";
	$min_count = "00";
	while($min_count < 60){
		$html .="<option value=\"$min_count\">$min_count</option>";
		$min_count = $min_count +15;
	}
	$html .="</select>";
	
	$html .="<input id=\"due_am_pm_am\" name=\"due_am_pm_am\" type=\"radio\" name=\"due_am_pm\" value=\"am\"";
	if($am_pm == "AM"){
		$html .=" checked "; 
	}
	$html .= "onchange=\"document.task.due_type[1].checked = true;\" /><label for=\"due_am_pm_am\" onchange=\"document.task.due_type[1].checked = true;\"\">AM</label>&nbsp;&nbsp;";
	
	$html .="<input id=\"due_am_pm_pm\" name=\"due_am_pm_am\" type=\"radio\" name=\"due_am_pm\" value=\"pm\"";
	if($am_pm == "PM"){
		$html .=" checked "; 
	}
	$html .="onchange=\"document.task.due_type[1].checked = true;\" /><label for=\"due_am_pm_pm\" onchange=\"document.task.due_type[1].checked = true;\"\">PM</label>";

	
	
	return $html;
}
/**
			 		
					 
						
			 
*/
?>


			 			