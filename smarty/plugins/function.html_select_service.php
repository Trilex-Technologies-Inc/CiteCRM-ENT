<?php

/**
 * @author 
 * @copyright 2007
 */

function smarty_function_html_select_service($params, &$smarty) {
	require_once(CLASS_PATH."/core/service.class.php");
	$serviceObj = new service();
	
	$service_array = $serviceObj->load_active();
	
	$html = "<select name=\"service_id\" id=\"service_id\">\n";
	
	foreach($service_array as $service) {
		
		$html .= "<option value=\"" . $service->get_service_id() . "\" ";
		
		if($service->get_service_id() == $params['value']) {
			$html .= " selected ";
		} 
		
			$html .= ">" . $service->get_service_name() . " $" . $service->get_service_amount(). "</option>\n";		
	}

	$html .= "</select>\n";
	
	return $html;

}
?>