<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_function_fetch_lead_meeting($params, &$smarty){
	global $core;
	$obj_id = $params['lead_meeting_id'];
	
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
	
	$html = "<img src=\"images/icons/copy_16.gif\" onMouseOver=\"ddrivetip('".$mouse."')\" onMouseOut=\"hideddrivetip()\" style=\"cursor:pointer\">";
	$html .= " <a href=\"".ROOT_URL."/index.php?page=leads:view_lead&lead_id=$lead_id\">Lead Meeting</a>";
				
	
	return $html;

}

?>