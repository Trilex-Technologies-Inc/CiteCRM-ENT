<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_lead_status} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_lead_status<br>
 * Purpose:  Prints the dropdowns for lead status
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_lead_status($params, &$smarty) {
	require_once(CLASS_PATH."/core/lead_status.class.php");

	$leadStatusObj = new lead_status();

	$leadStatusArray = $leadStatusObj->load_all();

	$html = "<select name=\"lead_status_id\" onChange=\"loadUser()\" id=\"lead_status_id\">\n";


	foreach($leadStatusArray as $leadObj) {

		$html .= "<option value=\"".$leadObj->get_lead_status_id()."\"";

		if($params['value'] == $leadObj->get_lead_status_id()){
			$html .=" selected ";
		}

		$html .=">".$leadObj->get_lead_status_text()."</option>\n";


	}

	$html .="</select>\n";

	return $html;

}

?>