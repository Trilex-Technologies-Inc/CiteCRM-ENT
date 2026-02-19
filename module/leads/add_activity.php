<?php



$smarty->assign('activity',$_POST['activity']);

switch($_REQUEST['activity']) {

	case "Call":

		if(isset($_POST['Submit'])) {

			require_once(CLASS_PATH."/core/lead_call.class.php");
			require_once(CLASS_PATH."/core/calendar.class.php");

			$leadCallObj  = new lead_call();
			$calendarObj  = new calendar();			

			$lead_id			= $_POST['lead_id'];
			$lead_call_text		= $core->prepare_post($_POST['lead_call_text']);
			$lead_call_subject	= $_POST['lead_call_subject'];
			$Date_Month			= $_POST['Date_Month'];
			$Date_Day			= $_POST['Date_Day'];
			$Date_Year			= $_POST['Date_Year'];
			$startHour			= $_POST['startHour'];
			$startMinute		= $_POST['startMinute'];
			$endHour			= $_POST['endHour'];
			$endMinute			= $_POST['endMinute'];
			$add_to_calendar	= $_POST['add_to_calendar'];
			$lead_call_by 		= $_POST['user_id'];
			
			if($lead_call_by < 1) {
				$lead_call_by		= $_SESSION['SESSION_USER_ID'];
			}
			
			// Add Calendar

			$lead_call_date 	= mktime($startHour,$startMinute,0,$Date_Month,$Date_Day,$Date_Year);
			$lead_call_duration = mktime($startHour + $endHour, $startMinute + $endMinute,0,$Date_Month,$Date_Day,$Date_Year);

			

			$lead_call_id = $leadCallObj->add_lead_call($lead_id,$lead_call_subject,$lead_call_text,$lead_call_date,$lead_call_duration,$lead_call_by);
			
			if($add_to_calendar == '1') {
				$start_id = $calendarObj->set_event($startHour,$startMinute,$Date_Month,$Date_Day,$Date_Year,'start',$lead_call_by,"Lead Call #$lead_call_id ".$lead_call_subject,$lead_call_text,'1','0','lead call',$lead_call_id,'0');
	
				$endTime = mktime($startHour + $endHour,$startMinute + $endMinute,0,$Date_Month,$Date_Day,$Date_Year);
			
				$end_hour	= date("H", $endTime);
				$end_min	= date("i",$endTime);
				$end_month	= date("m",$endTime);
				$end_day	= date("d",$endTime);
				$end_year	= date("Y",$endTime);
	
				$calendarObj->set_event($end_hour,$end_min,$end_month,$end_day,$end_year,'end',$lead_call_by,"Lead Call #$lead_call_id ",$lead_call_subject,'1','0','lead call',$lead_call_id,$start_id);
			}
			
            $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Created Lead Call ID #'.$lead_call_id);

		} else {	

            $startTime 	= mktime(COMPANY_START_HOUR,COMPANY_START_MIN,0,date("m"),date("d"),date("Y"));

            $smarty->assign('startTime',$startTime);

			$smarty->display('leads/ajax_add_call.tpl');
		}
	break;
	
	// Email
	case "Email":

		$lead_id = $_POST['lead_id'];
		
		$smarty->assign('lead_id',$lead_id);
	
		if(isset($_POST['Submit'])) {

			require_once(CLASS_PATH."/core/lead_email.class.php");
			require_once(CLASS_PATH."/core/user.class.php");
			$userObj = new user();
			
			$userObj->loadUserByID($_SESSION['SESSION_USER_ID']);

			$leadEmailObj = new lead_email();

			$email_to				= $_POST['email_address'];
			$email_name				= $_POST['email_address'];
			$email_subject			= $_POST['email_subject'];
			$email_text				= $_POST['email_text'];
			$lead_mail_sent_by		= $_SESSION['SESSION_USER_ID'];
			$lead_mail_date_sent	= time();
			$email_delivered 		= 0;
			
			$mail_from_email		= $userObj->getUserEmail();
			$mail_from_name			= $userObj->getUserFirstName() . " " . $userObj->getUserLastName();
	
            if($_POST['add_new_user'] == '1') {
                require_once(CLASS_PATH."/core/user_to_company.class.php");
                $user_to_companyObj = new user_to_company();

                $name = explode(' ', $_POST['email_name']);
                $user_type_id = 3;
                $user_admin = 0;
                $user_status = 'Active';
                $user_password  = $userObj->createVerificationCode(8);
                $user_first_name        = $name[0];
                $user_last_name         = $name[1];
                $user_email             = $email_to;
                $user_create_date       = time();
                $user_activation_date   = time();
                $new_user_id = $userObj->add_user($user_type_id,$user_admin,$user_status,$user_username,$user_password,$user_first_name,$user_last_name,$user_email,$user_create_date,$user_activation_date);


                $user_to_companyObj->add_user_to_company($new_user_id,$lead_id);
            }
			
			
			// Mail if we have settings
			if(COMPANY_SMTP_SERVER != ''){
				require_once(ROOT_PATH."/include/phpmailer/class.phpmailer.php");	
				$mail = new PHPMailer(); 
				
				$mail->IsSMTP();                                   // send via SMTP
				$mail->Host     = COMPANY_SMTP_SERVER; // SMTP servers
				
				if(COMPANY_SMTP_PASSWORD !=''){
					$mail->SMTPAuth = true;     // turn on SMTP authentication
					$mail->Username = COMPANY_SMTP_USER;  // SMTP username
					$mail->Password = COMPANY_SMTP_PASSWORD; // SMTP password
				}
												
				$mail->From     = COMPANY_SMTP_USER;
				$mail->FromName = COMPANY_SMTP_FROM;				
				$mail->AddAddress($email_to,$email_name); 				
				$mail->AddReplyTo(COMPANY_SMTP_REPLY);				
				$mail->WordWrap = 80;                              // set word wrap 
				$mail->IsHTML(true);                               // send as HTML
				$mail->Subject  =  $email_subject;
				$mail->Body = $email_text;
				$mail->AltBody = $email_text;
				
				if(!$mail->Send()){
			   		echo "Message was not sent <p>";
			   		echo "Mailer Error: " . $mail->ErrorInfo;
			   		exit;
				} else {
					echo "Mail Was Sent";
					$email_delivered = 1;
					$mail_from_email = COMPANY_SMTP_USER;
					$mail_from_name = COMPANY_SMTP_FROM;
				}
			}
			
			
			
			$mail_id = $leadEmailObj->add_lead_email_details($core->prepare_post($email_text),$email_subject,$email_to,$email_name,$mail_from_name,$mail_from_email,$email_delivered,$lead_mail_date_sent);
			
			
			$leadEmailObj->add_lead_email($lead_id,$mail_id,$lead_mail_sent_by,$lead_mail_date_sent);
			
			$core->force_page(ROOT_URL."/index.php?page=leads:view_lead&lead_id=".$lead_id);


		} else {
			
			if(COMPANY_SMTP_SERVER == ''){
				$smarty->assign('errorMsg','SMTP Server has not been set. Your email will only be recorded and not delivered. To send emails from the CRM you must first configure the SMTP Server Settings.');
			}
			
			$smarty->display('leads/ajax_add_email.tpl');


			
		}
	break;
	
	// Meeting
	case "Meeting":
		if(isset($_POST['Submit'])){
			require_once(CLASS_PATH."/core/lead_meeting.class.php");
            require_once(CLASS_PATH."/core/calendar.class.php");

			$leadMeetingObj = new lead_meeting();
            $calendarObj    = new calendar();

			$startMonth		= $_POST['startMonth'];
			$startDay		= $_POST['startDay'];
			$startYear		= $_POST['startYear'];
			$startHour		= $_POST['startHour'];
			$startMinute	= $_POST['startMinute'];

			$endMonth		= $_POST['endMonth'];
			$endDay			= $_POST['endDay'];
			$endYear		= $_POST['endYear'];
			$endHour		= $_POST['endHour'];
			$endMinute		= $_POST['endMinute'];

			$lead_meeting_start		= mktime($startHour,$startMinute,0,$startMonth,$startDay,$startYear);
			$lead_meeting_end		= mktime($endHour,$endMinute,0,$endMonth,$endDay,$endYear);

			$lead_id				= $_POST['lead_id'];
			$lead_meeting_subject	= $_POST['lead_meeting_subject'];
            $lead_meeting_text      = $core->prepare_post($_POST['lead_meeting_text']);
			$lead_meeting_active	= $_POST['lead_meeting_active'];

            $lead_meeting_by        = $_POST['user_id'];
            if($lead_meeting_by < 1) {
            	$lead_meeting_by = $_SESSION['SESSION_USER_ID'];
			}
			
			$lead_meeting_id = $leadMeetingObj->add_lead_meeting($lead_id,$lead_meeting_subject,$lead_meeting_text,$lead_meeting_start,$lead_meeting_end,$lead_meeting_active);

            // Set Calendar
            $start_id = $calendarObj->set_event($startHour,$startMinute,$startMonth,$startDay,$startYear,'start',$lead_meeting_by,$lead_meeting_subject,$lead_meeting_text,'1','0','lead meeting',$lead_meeting_id,'0');

            $calendarObj->set_event($endHour,$endMinute,$endMonth,$endDay,$endYear,'end',$lead_meeting_by,"Lead Meeting $lead_meeting_id",$lead_meeting_subject,'1','0','lead meeting',$lead_meeting_id,$start_id);

            // Log
             $core->log_action($_SESSION['SESSION_USER_ID'],'Create','Created Lead Meeting ID #'.$lead_meeting_id);

		} else {
			$smarty->display('leads/ajax_add_meeting.tpl');
		}
		
	break;
	
	case "Apointment":
		$smarty->display('leads/ajax_add_appointment.tpl');
	break;

}

?>