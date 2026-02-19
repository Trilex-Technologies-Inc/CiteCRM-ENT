<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_operating_system_manufacture} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_operating_system_manufacture<br>
 * Purpose:  Prints the dropdowns for Operating System Manufacture selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_operating_system_manufacture($params, &$smarty) {

	require_once(CLASS_PATH."/core/operating_system_manufacture.class.php");
	
	$operating_system_manufacture = new operating_system_manufacture();
	
	$operating_system_manufacture_array = $operating_system_manufacture->load_all();
	
	$html  = "<script language=\"javascript\" type=\"text/javascript\">\n";
	$html .= "function load_operating_system() {\n";
	$html .= "	urlVars = {\n";
	$html .= "	}\n";
	$html .= "	bodyVars = {\n";
	$html .= "		operating_system_manufacture_id: document.getElementById(\"operating_system_manufacture_id\").value\n";
	$html .= "	}\n";
	$html .= "	ajaxCaller.postVars(\"index.php?page=operating_system:ajax_fetch_operating_system&escape=1\", bodyVars, urlVars, on_response_operating_system,false, \"a postVars request\");\n";
	$html .= "}\n";
	$html .= "\n";
	
	$html .= "function on_response_operating_system(text, headers, callingContext) {\n";
	$html .= "	document.getElementById(\"".$params['div']."\").innerHTML = text;\n";
	$html .= "}\n";


	$html .= "</script>\n";
	$html .= "<select name=\"operating_system_manufacture_id\" id=\"operating_system_manufacture_id\" onChange=\"load_operating_system()\">\n";
	
	$html .= "<option value=\"\">Select OS Manufacture</option>\n";

	foreach($operating_system_manufacture_array as $operating_system_manufacture) {
	
		$html .= "<option value=\"" . $operating_system_manufacture->get_operating_system_manufacture_id() . "\" ";
		
		// Setup Slected
		if($operating_system_manufacture->get_operating_system_manufacture_id() == $params['value']) {
			$html .= " selected ";
		} 
		
		
		$html .= ">" . $operating_system_manufacture->get_operating_system_manufacture_name() . "</option>\n";
	
	}
	
	$html .= "</select> \n";
	
	return $html;

}

?>