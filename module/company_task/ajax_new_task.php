<?php

/**
 * @author Jaimie
 * @copyright 2007
 */
$core->verifyAdmin(CAN_CREATE);
require_once(CLASS_PATH."/core/company_task.class.php");
$taskObj = new company_task();

if(isset($_POST['submit'])){

	$add_category 			= $_POST['add_category'];
	$company_task_category	= $_POST['company_task_category'];
	$company_task_name		= $_POST['company_task_name'];
	$company_id				= $_POST['company_id'];
	$due_type_none			= $_POST['due_type_none'];
	$due_day				= $_POST['due_day'];
	$due_month				= $_POST['due_month'];
	$due_year				= $_POST['due_year'];
	$due_hour				= $_POST['due_hour'];
	$due_minute				= $_POST['due_minute'];
	$due_am_pm_am			= $_POST['due_am_pm_am'];
	$alarm					= $_POST['alarm'];
	$alarm_unit				= $_POST['alarm_unit'];
	$alarm_value			= $_POST['alarm_value'];
	$company_task_priority	= $_POST['company_task_priority'];
	$company_task_status	= $_POST['company_task_status'];
	$company_task_text		= $core->prepare_post($_POST['company_task_text']);
	$company_task_create_by	= $_SESSION['SESSION_USER_ID'];
	$company_task_create	= time(); 
	//add Category
	if($add_category == 1){
		$company_task_category = $taskObj->add_task_category($company_task_category);
	}
	
	// Set Due date
	if($due_type_none == 1){		
		if($due_am_pm_am == 'PM'){
			$due_hour = $due_hour + 12;	
		}		
		$company_task_due = mktime($due_hour,$due_minute,0,$due_month,$due_day,$due_year);
	} else {
		$company_task_due = 0;
	}
	
	
	// Set Alarm
	if($alarm == 1){
		$minutes = $alarm_value * $alarm_unit;
		if($company_task_due > 1){
			$company_task_alarm = mktime($due_hour,$due_minute - $minutes ,0,$due_month,$due_day,$due_year);
		} else {
			$company_task_alarm = mktime(date("H"),date("i") - $minutes ,0,date("m"),date("d"),date("Y"));
		}		
	}
	
	$task_id = $taskObj->new_task($company_id,
				$company_task_name,
				$company_task_create,
				$company_task_due,
				$company_task_alarm,
				$company_task_priority,
				$company_task_category,
				$company_task_text,
				$company_task_status,
				$company_task_create_by);
		

	
} else {
	$smarty->display('company_task/ajax_new_task.tpl');
	
}

?>