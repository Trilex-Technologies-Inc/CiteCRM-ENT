<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_workorder.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_EDIT);

require(CLASS_PATH.'/core/workorder.class.php');	

$workorder = new workorder();
	
$workorder_id 	= $_REQUEST['workorder_id'];
	
$status_id 		= $_REQUEST['status_id'];
	


$workorder->view_workorder($workorder_id);
	
	
	// Which Update
	switch($status_id) {
		// New
		case "1":
			$workorder->set_new($workorder_id);
		break;

		case "2": // assign
			
			if(isset($_REQUEST['submit'])) {
				require_once(CLASS_PATH."/core/user.class.php");
				require_once(CLASS_PATH."/core/calendar.class.php");

				$userObj = new user();
				$calendarObj = new calendar();			
	
				$workorder_assigned_to	= $_REQUEST['workorder_assigned_to'];
				$workorder_id			= $_REQUEST['workorder_id'];				
				$workorder->assign($workorder_assigned_to, $workorder_id);
			
				$userObj->loadUserByID($workorder_assigned_to);

				$name = $userObj->getUserFirstName()." ".$userObj->getUserLastName();
				$msg = "<b>Workorder Assigned</b> Assigned to $name";
                $workorder_subject = "Work Order Assigned";
				$workorder->add_workorder_note($workorder_id,$msg,$workorder_subject,1);

				// Check if we need to reasign the schedual
				$calendarObj->load_by_type('workorder',$workorder_id);
				if($calendarObj->get_user_id() != $workorder_assigned_to && $calendarObj->get_user_id() != "") {
					$calendarObj->update_use($workorder_assigned_to,$calendarObj->get_calendar_id());
					$msg = "<b>Schedual Re-Assigned</b> Assigned to $name";
					$workorder->add_workorder_note($workorder_id,$msg,1);
				}

				

			} else {
			
				$smarty->display('workorder/ajax_assign_tech.tpl');
			
			}
		break;
		
		// Awaiting Parts
		case "3": 		
			if(isset($_POST['submit'])){
				$workorder_id				= $_POST['workorder_id'];
				$workorder_note_text		= $_POST['workorder_note_text'];
                $workorder_subject          = "Work Order Set to Awaiting Parts";				
				if(!empty($workorder_note_text)) {
					$workorder->add_workorder_note($workorder_id,$workorder_note_text,$workorder_subject);
				}
				$workorder->set_waiting_for_parts($workorder_id);			
			} else {				
				$smarty->display("workorder/ajax_awating_parts.tpl");
			}	
		break;		
		// On Hold
		case "4":
			if(isset($_REQUEST['submit'])){		
				$workorder_id				= $_REQUEST['workorder_id'];
				$workorder_note_text		= $_REQUEST['workorder_note_text'];
                $workorder_subject          = "Work Order Set On Hold";			
				if(!empty($workorder_note_text)) {
					
					$workorder->add_workorder_note($workorder_id,$workorder_note_text,$workorder_subject);
				}				
				$workorder->set_on_hold($workorder_id);				
			} else {				
				$smarty->display("workorder/ajax_on_hold.tpl");
			}
		
		break;
	
		// Completed
		case "5":
		
			
		break;
	
        // Suspended
        case "6":
            if(isset($_REQUEST['submit'])){
				$workorder_id           = $_POST['workorder_id'];
				$workorder_note_text    = $_POST['workorder_note_text'];
                $workorder_subject      = "Work Order Set to Suspended";			     
                $workorder->set_suspended($workorder_id,$workorder_note_text,$workorder_subject);		
				// Remove Schedual
				require_once(CLASS_PATH."/core/calendar.class.php");
				$calendarObj = new calendar();
				$calendarObj->remove_workorder_schedual($workorder_id);								
			} else {				
				$smarty->display("workorder/ajax_suspended.tpl");
			}   
        break;
		
		// Waiting for customer Aproval
		case "8":
			$workorder->set_waiting_for_customer_aprov($workorder_id);
		break;
	
	}
	
	
?>