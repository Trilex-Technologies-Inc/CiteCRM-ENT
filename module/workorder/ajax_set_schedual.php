<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_set_schedual.php<br>
 * Purpose:  Set the workorder schedual time<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_CREATE);

if(isset($_REQUEST['submit'])) {

	require_once(CLASS_PATH."/core/workorder.class.php");
	require_once(CLASS_PATH."/core/calendar.class.php");
	
	$workorderObj = new workorder();
	$calendarObj = new calendar();
	
	// Load Vars
	$workorder_id = $_REQUEST['workorder_id'];

	$startHour	= $_REQUEST['startTimeHour'];	
	$startMin	= $_REQUEST['startTimeMinute'];
	$startMonth	= $_REQUEST['startDateMonth'];
	$startDay	= $_REQUEST['startDateDay'];
	$startYear	= $_REQUEST['startDateYear'];

	$endHour	= $_REQUEST['endTimeHour'];
	$endMin		= $_REQUEST['endTimeMinute'];
	$endMonth	= $_REQUEST['endDateMonth'];
	$endDay		= $_REQUEST['endDateDay'];
	$endYear	= $_REQUEST['endDateYear'];

	// Clear Calendar
	$calendarObj->remove_workorder_schedual($workorder_id);

	// Load Workorder 
	$workorderObj->view_workorder($workorder_id);

	$user_id = $workorderObj->get_workorder_assigned_to();

	// Start & end
	$workorder_start_time = mktime($startHour,$startMin,0,$startMonth,$startDay,$startYear);
	
	$workorder_end_time =  mktime($endHour,$endMin,0,$endMonth,$endDay,$endYear);
	
	// Save workorder
	$workorderObj->set_schedual($workorder_start_time,$workorder_end_time,$workorder_id);

	// save note
	$start	= date("H",$workorder_start_time).":".date("i",$workorder_start_time)." ".date("m",$workorder_start_time)."-".date("d",$workorder_start_time)."-".date("Y",$workorder_start_time);
	$end	= date("H",$workorder_end_time).":".date("i",$workorder_end_time)." ".date("m",$workorder_end_time)."-".date("d",$workorder_end_time)."-".date("Y",$workorder_end_time);
	$note = "Schedual Set $start To $end";
	$workorderObj->add_workorder_note($workorder_id,$note,'Schedual Set',1);


	// Calculate how many days the schedual spans
	$endDate = $endMonth."/".$endDay."/".$endYear;
	$beginDate = $startMonth."/".$startDay."/".$startYear;

	$numDays = $core->dateDiff("/", $endDate, $beginDate);

	// If we have more than one day we need to INsert it into the db
	if($numDays > 0) {

		// If after Hours sched then next day starts at 000
		if($_POST['after_hours'] > 0) {

			$dayCount = 0;
			$numDays;

			while($dayCount <= $numDays) {
				$start_time = mktime(COMPANY_START_HOUR,COMPANY_START_MIN,0,$startMonth,$startDay + $dayCount ,$startYear);
				// Skip Sat
				if(date('D',$start_time) == 'Sat' && $_POST['inc_sat'] == '0'){
					$skipDay = true;
				}
				
				// Skip Sunday
				if(date('D',$start_time)  == 'Sun'){
					$skipDay = true;
				}

				if($skipDay != true){				
						// First Date entry
						if($dayCount == 0) {
							$_sts = mktime($startHour,$startMin,0,$startMonth,$startDay+$dayCount,$startYear);
							$start_id = $calendarObj->set_event(date("H",$_sts),date("i",$_sts),date("m",$_sts),date("d",$_sts) ,date("Y",$_sts),'start',$user_id,"Workorder #$workorder_id",'','1','0','workorder',$workorder_id,'0');
							
							$_ets = mktime(23,59,59,$startMonth,$startDay+$dayCount,$startYear);
							$calendarObj->set_event(date("H",$_ets),date("i",$_ets),date("m",$_ets),date("d",$_ets),date("Y",$_ets),'end',$user_id,"Workorder #$workorder_id",'','1','0','workorder',$workorder_id,$start_id);				
						}

						// Middle Date Entry
						if($dayCount != $numDays && $dayCount != 0) {
							$_sts = mktime(0,0,0,$startMonth,$startDay+$dayCount,$startYear);
							$start_id = $calendarObj->set_event(date("H",$_sts),date("i",$_sts),date("m",$_sts),date("d",$_sts) ,date("Y",$_sts),'start',$user_id,"Workorder #$workorder_id Cont.",'','1','0','workorder',$workorder_id,'0');

							$_ets = mktime(23,59,59,$startMonth,$startDay+$dayCount,$startYear);
							$calendarObj->set_event(date("H",$_ets),date("i",$_ets),date("m",$_ets),date("d",$_ets),date("Y",$_ets),'end',$user_id,"Workorder #$workorder_id Cont.",'','1','0','workorder',$workorder_id,$start_id);				
						}

						// Last Date Entry
						if($dayCount == $numDays) {
							$_sts = mktime(0,0,0,$startMonth,$startDay+$dayCount,$startYear);
							$start_id = $calendarObj->set_event(date("H",$_sts),date("i",$_sts),date("m",$_sts),date("d",$_sts) ,date("Y",$_sts),'start',$user_id,"Workorder #$workorder_id Cont.",'','1','0','workorder',$workorder_id,'0');

							$_ets = mktime($endHour,$endMin,0,$startMonth,$startDay+$dayCount,$startYear);
							$calendarObj->set_event(date("H",$_ets),date("i",$_ets),date("m",$_ets),date("d",$_ets),date("Y",$_ets),'end',$user_id,"Workorder #$workorder_id Cont.",'','1','0','workorder',$workorder_id,$start_id);				
						}
					
				} else {
					$skipDay = false;
				}

				$dayCount++;	
			}

		} else {
			// Normal Bussines hours
			$dayCount = 0;
			while($dayCount <= $numDays) {
				$start_time = mktime(COMPANY_START_HOUR,COMPANY_START_MIN,0,$startMonth,$startDay + $dayCount ,$startYear);
				
				// Skip Sat
				if(date('D',$start_time) == 'Sat' && $_POST['inc_sat'] == '0'){
					$skipDay = true;
				}
				
				// Skip Sun
				if(date('D',$start_time)  == 'Sun'){
					$skipDay = true;
				}
			
				if($skipDay != true){
					// Start Date
					if($dayCount == 0) {
						$_ts = mktime($startHour,$startMin,0,$startMonth,$startDay+$dayCount,$startYear);
						$start_id = $calendarObj->set_event(date("H",$_ts),date("i",$_ts),date("m",$_ts),date("d",$_ts) ,date("Y",$_ts),'start',$user_id,"Workorder #$workorder_id",'','1','0','workorder',$workorder_id,'0');
					} else {
						// Middle Start
						$_ts = mktime(COMPANY_START_HOUR,COMPANY_START_MIN,0,$startMonth,$startDay+$dayCount,$startYear);
						$start_id = $calendarObj->set_event(date("H",$_ts),date("i",$_ts),date("m",$_ts),date("d",$_ts) ,date("Y",$_ts),'start',$user_id,"Workorder #$workorder_id Cont.",'','1','0','workorder',$workorder_id,'0');
					}
					
					// Last Date
					if($dayCount == $numDays) {
						$_ts = mktime($endHour,$endMin,0,$endMonth,$endDay,$endYear);
						$calendarObj->set_event(date("H",$_ts),date("i",$_ts),date("m",$_ts),date("d",$_ts),date("Y",$_ts),'end',$user_id,"Workorder #$workorder_id cont.",'','1','0','workorder',$workorder_id,$start_id);
					} else {
						// Middle End
						$_ts = mktime(COMPANY_END_HOUR,COMPANY_END_MIN,0,$endMonth,$startDay+$dayCount,$endYear);
						$calendarObj->set_event(date("H",$_ts),date("i",$_ts),date("m",$_ts),date("d",$_ts),date("Y",$_ts),'end',$user_id,"Workorder #$workorder_id cont.",'','1','0','workorder',$workorder_id,$start_id);							
					}	
									
				} else {
					$skipDay = false;
				}	

				$dayCount++;		
			}
			
		}

	} else {
		// Normal 1 Day event
		$start_id = $calendarObj->set_event($startHour,$startMin,$startMonth,$startDay,$startYear,'start',$user_id,"Workorder #$workorder_id",'','1','0','workorder',$workorder_id,'0');		
		$calendarObj->set_event($endHour,$endMin,$endMonth,$endDay,$endYear,'end',$user_id,"Workorder #$workorder_id",'','1','0','workorder',$workorder_id,$start_id);
	}

	
	// Load Calendar events
	

	$smarty->assign('workorder_start_time', $workorder_start_time);
	
	$smarty->assign('workorder_end_time', $workorder_end_time);	

	$smarty->display('workorder/view_schedual.tpl');

} else {
	

	$startTime 	= mktime(COMPANY_START_HOUR,COMPANY_START_MIN,0,$_POST['month'],$_POST['day'],$_POST['year']);
	
	$endTime	= mktime(COMPANY_END_HOUR,COMPANY_END_MIN,0,$_POST['month'],$_POST['day'],$_POST['year']);

	$smarty->assign('startTime', $startTime);

	$smarty->assign('endTime',$endTime);

	$smarty->display('workorder/ajax_set_schedul.tpl');

}
?>