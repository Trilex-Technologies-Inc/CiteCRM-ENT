<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_company} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_company<br>
 * Purpose:  Prints the dropdowns for Company selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_company($params, &$smarty) {


	require_once(CLASS_PATH."/core/company.class.php");
	
	$company = new company();
	
	$company_array = $company->load_all();
	
	// IF we assign Div then do ajax 
	if($params['div'] != "") {
		$html  = "<script language=\"javascript\" type=\"text/javascript\">\n";
		$html .= "function load_company_users() {\n";
		$html .= "	urlVars = {\n";
		$html .= "	}\n";
		$html .= "	bodyVars = {\n";
		$html .= "		company_id: document.getElementById(\"company_id\").value\n";
		$html .= "	}\n";
		$html .= "	ajaxCaller.postVars(\"index.php?page=company:ajax_fetch_company_users&escape=1\", bodyVars, urlVars, on_response_company_users,false, \"a postVars request\");\n";
		$html .= "}\n";
		$html .= "\n";		
		
		$html .= "function on_response_company_users(text, headers, callingContext) {\n";
		$html .= "	document.getElementById(\"".$params['div']."\").innerHTML = text;\n";
		$html .= "}\n";	
		$html .= "</script>\n";
	}
	
	
	$html .= "<select name=\"company_id\" id=\"company_id\" "; 
	
	if($params['div'] != "") {
		$html .= " onChange=\"load_company_users()\">\n";
	} else {
		$html .= "	>\n";
	}
	
	$html .= "<option value=\"\">Un-Assigned</option>\n";
	
	
	foreach($company_array as $company) {
	
		$html .= "<option value=\"" . $company->get_company_id() . "\" ";
		
		// Setup Slected
		if($company->get_company_id() == $params['value']) {
			$html .= " selected ";
		} 
		
		
		$html .= ">" . $company->get_company_name() . "</option>\n";
	
	}
	
	
	$html .= "</select>\n";
	
	return $html;
	


}