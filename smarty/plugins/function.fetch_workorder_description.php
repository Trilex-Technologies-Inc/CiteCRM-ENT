<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_function_fetch_workorder_description($params, &$smarty) {
	global $core;
	require_once(CLASS_PATH."/core/workorder.class.php");
	
	$workorderObj = new workorder();
	
	$workorderObj->load_company_by_workorder($params['workorder_id']);

	$company_name = $workorderObj->fields['company_name'];
	
	
	$workorderObj->view_workorder($params['workorder_id']);
	$wo_id = $params['workorder_id'];
	
	
	switch($workorderObj->get_workorder_status()){
		case '1': 
			$status = 'New';
		break; 
		case '2':
		 	$status = 'Assigned';
		break; 
		case '3':
		 	$status = 'Waiting For Parts';
		break; 
		case '4': 
			$status = 'On Hold';
		break; 
		case '5':
			$status = 'Completed';
		break; 
		case '6':
			$status = 'Suspended';
		break; 
		case '7': 
			$status ='Completed';
		break; 
		case '8':
			$status ='Waiting For Customer Aproval';
		break; 
	}
	
	$mouse .="<b>Account: </b> " .$company_name. "<br>";
	$mouse .="<b>Status: </b> " . $status . "<br>";
	$mouse .="<b>Scope: </b>" .$core->escape_javascript($workorderObj->get_workorder_scope())."<br>";
	$mouse .="<b>Description:</b><br>";
	$mouse .=$core->escape_javascript($workorderObj->get_workorder_desription())."<br>";
	
	$html = "<img src=\"images/icons/copy_16.gif\" onMouseOver=\"ddrivetip('".$mouse."')\" onMouseOut=\"hideddrivetip()\" style=\"cursor:pointer\">";
	
	$html .=" <a href=\"".ROOT_URL."/index.php?page=workorder:view_workorder&workorder_id=$wo_id\">Work Order #$wo_id</a>";
	
	return $html;

}

?>