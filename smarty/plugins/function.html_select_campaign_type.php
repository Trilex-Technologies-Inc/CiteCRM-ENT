<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_workorder_status} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_workorder_status<br>
 * Purpose:  Prints the dropdowns for Work Order Status selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_campaign_type($params, &$smarty) {
	require_once(CLASS_PATH."/core/campaign_type.class.php");

	$campaignObj = new campaign_type();

	$campaignArray = $campaignObj->load_all();

	$html = "<select name=\"campaign_type_id\" id=\"campaign_type_id\">\n";
	if($params['value'] == 0) {
		$html .= "<option value=\"0\" selected>None</option>";
	}


	foreach($campaignArray as $campaign){
		$html .= "<option value=\"".$campaign->get_campaign_type_id()."\"";

		if($params['value'] == $campaign->get_campaign_type_id()) {
			$html .= " selected ";
		}

		$html .= ">".$campaign->get_campaign_type_text()."</option>\n";

	}

	$html .= "</select>";

	return $html;
	
}