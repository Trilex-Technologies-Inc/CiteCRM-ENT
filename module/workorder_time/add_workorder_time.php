<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_workorder_time.php<br>
 * Purpose:  Add New Workorder Time<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH.'/core/workorder_time.class.php');
$workorder_time = new workorder_time();

$core->verifyAdmin();



// If form Submission
if(isset($_REQUEST['submit']) ) {

	// Conect to smarty validator
	SmartyValidate::connect($smarty);
	
	// If valid Post Disconect and add new workorder_time
	if(SmartyValidate::is_valid($_POST)) {
	
	
		SmartyValidate::disconnect();
			

			
		$time_start 				= $_REQUEST['workorder_time_start'];
		$startHour					= $_REQUEST['startHour'];
		$startMinute				= $_REQUEST['startMinute'];
		$endHour						= $_REQUEST['endHour'];
		$endMinute					= $_REQUEST['endMinute'];
		$workorder_id				= $_REQUEST['workorder_id'];
		$user_id						= $_REQUEST['user_id'];
			
		// Create Start Date
		$pices = explode("-", $time_start);			
		
		$month 	= $pices[1];
		$day		= $pices[2];
		$year		= $pices[0];
			
		$workorder_time_start = mktime($startHour,$startMinute,0,$month,$day,$year);	
		//print date("Y-m-d H:i:s", $workorder_time_start);
		
		// Create End Date		
		$workorder_time_end =  mktime(date("h") + $endHour,date("i") + $endMinute,0,$month,$day,$year);
		//print date("Y-m-d H:i:s", $workorder_time_end);
		
		// Total Time
		$minHour = $endHour * 60;	
		
		$min = $endMinute / 60;
		
		$workorder_time_total = $endHour  + $min;
		
		$workorder_time_id = $workorder_time->add_workorder_time($workorder_id,$user_id,$workorder_time_start,$workorder_time_end,$workorder_time_total);
			
		$core->force_page("index.php?page=workorder_time:view_workorder_time&workorder_time_id=".$workorder_time_id);
			
	} else {
	
	// error, redraw the form
	$smarty->assign($_POST);
	
	$smarty->assign("errorOccurred",true);
			
	$smarty->display('workorder_time/add_workorder_time_frm.tpl');
			
		}
		
} else {

	// Display the Form
	
	SmartyValidate::connect($smarty, true);
	
	SmartyValidate::register_form('new_workorder_time_frm');
	
	$smarty->assign('workorder_time_start', date("Y-m-d",time()) );
	
	$smarty->display('workorder_time/add_workorder_time_frm.tpl');
	
}
?>