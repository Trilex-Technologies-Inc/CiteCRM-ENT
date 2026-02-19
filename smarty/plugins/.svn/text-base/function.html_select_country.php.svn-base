<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_country} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_country<br>
 * Purpose:  Prints the dropdowns for country selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_country($params, &$smarty) {

	require_once(CLASS_PATH."/core/country.class.php");
	
	$country = new country();
		
	$country_array = $country->loadAll();
	
	$html  = "";
	
	$html  = "<script language=\"javascript\" type=\"text/javascript\">\n";
	$html .= "function load_".$params['name']."() {\n";
	$html .= "	urlVars = {\n";
	$html .= "	}\n";
	$html .= "	bodyVars = {\n";
	$html .= "		country_id: document.getElementById(\"".$params['name']."\").value\n";
	$html .= "	}\n";
	$html .= "	ajaxCaller.postVars(\"index.php?page=state:ajax_fetch_state&state_name=".$params['state_name']."&escape=1\", bodyVars, urlVars, onResponse,false, \"a postVars request\");\n";
	$html .= "}\n";
	$html .= "\n";
	
	$html .= "function onResponse(text, headers, callingContext) {\n";
	$html .= "	document.getElementById(\"".$params['state_div_id']."\").innerHTML = text;\n";
	$html .= "}\n";
	
	
	
	$html .= "</script>\n";
	
	$html .= "<select name=\"".$params['name']."\" id=\"".$params['name']."\" onChange=\"load_".$params['name']."()\">\n";
	
	$html .= "<option value=\"\">Select Country</option>\n";
	
	foreach($country_array as $key => $val) {
	
		$html .= "<option value=\"" . $val->get_country_id() . "\" ";
		
		// Setup Slected
		if($val->get_country_id() == $params['value']) {
			$html .= " selected ";
		} 
		
		if($params['code_only'] == true) {
			$html .= ">" . $val->get_country_code() . "</option>\n";
		} else {
			$html .= ">" . $val->get_country_text() . "</option>\n";
		}
	
	}
	
	$html .= "</select>\n";
	
	return $html;
	
	



}