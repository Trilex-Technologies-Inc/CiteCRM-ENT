<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_function_fetch_lead_call($params, &$smarty){
	global $core;
	$obj_id = $params['lead_call_id'];

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
			
			
	
	$text = "<a href=\"".ROOT_URL."/index.php?page=leads:view_lead&lead_id=$lead_id\" style=\"color:black;text-decoration:none;\">Lead Call</a>";
	$mouse = "<b>Lead: </b>".$companyObj->get_company_name()."<br>";
	$mouse .= "<b>Subject: </b>".$core->escape_javascript($lead_callObj->get_lead_call_subject())."<br>";
	$mouse .="<b>Details:</b><br>";
	$mouse .=$core->escape_javascript($lead_callObj->get_lead_call_text())."<br>";
	
	$html = "<img src=\"images/icons/copy_16.gif\" onMouseOver=\"ddrivetip('".$mouse."')\" onMouseOut=\"hideddrivetip()\" style=\"cursor:pointer\">";
	$html .=" <a href=\"".ROOT_URL."/index.php?page=leads:view_lead&lead_id=$lead_id\">Lead Call</a>";
	
	return $html;

}

?>