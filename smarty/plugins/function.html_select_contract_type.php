<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_billing_rate} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_billing_rate<br>
 * Purpose:  Prints the dropdowns for Billing Rate selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_contract_type($params, &$smarty) {

	require_once(CLASS_PATH."/core/contract_type.class.php");
	
	$contractObj = new contract_type();	
	$contractArray = $contractObj->load_all();

	$html = "<select name=\"contract_type_id\" id=\"contract_type_id\">\n";

	$html .="<option value=\"0\">-- None --</option>\n";

	foreach($contractArray as $contract){
		$html .= "<option value=\"".$contract->get_contract_type_id()."\">".$contract->get_contract_type_name()." - ($".$contract->get_contract_type_rate().")</option>\n";
	}

	$html .="</select>\n";


	return $html;



}
