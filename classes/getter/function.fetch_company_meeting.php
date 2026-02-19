<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_function_fetch_company_meeting($params, &$smarty){
	global $core;
	$obj_id = $params['company_meeting_id'];
	
	require_once(CLASS_PATH."/core/company_meeting.class.php");
	require_once(CLASS_PATH."/core/company.class.php");
				
	$meetingObj = new company_meeting();
	$companyObj = new company();
				
	$meetingObj->view_meeting($obj_id);
	$companyObj->view_company($meetingObj->get_company_meeting_id());
				
	$class="company_meeting";
	$text = 'Account Meeting';
	$mouse = "<b>Account: </b>".$companyObj->get_company_name()." <br>";
	$mouse .= "<b>Subject: </b>" . $core->escape_javascript($meetingObj->get_company_meeting_subject()) ."<br>";
	$mouse .="<b>Details:</b><br>";
	$mouse .=$core->escape_javascript($meetingObj->get_company_meeting_text())."<br>";
}

?>