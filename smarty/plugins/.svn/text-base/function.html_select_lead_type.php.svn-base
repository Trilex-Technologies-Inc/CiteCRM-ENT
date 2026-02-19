<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_lead_type} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_lead_type<br>
 * Purpose:  Prints the dropdowns for lead type
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_lead_type($params, &$smarty) {

	require_once(CLASS_PATH."/core/lead_type.class.php");

	$leadTypeObj = new lead_type();

	$leadTypeArray = $leadTypeObj->load_all();

	$html = "<select name=\"lead_type_id\" value=\"".$params['value']."\" id=\"lead_type_id\">\n";
		
	$html .= "<option value\"0\">Select One</option>";

	foreach($leadTypeArray as $leadObj) {

		$html .="<option value=\"".$leadObj->get_lead_type_id()."\"";

		if($params['value'] == $leadObj->get_lead_type_id()){
			$html .=" selected ";
		}

		$html .=">".$leadObj->get_lead_type_text()."</option>\n";

	}


	$html .="</select>\n";

	return $html;
}

?>