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
function smarty_function_html_select_campaign($params, &$smarty) {
	require_once(CLASS_PATH."/core/campaign.class.php");

	$campaginObj = new campaign();

	$campaignArray = $campaginObj->load_all();

	$html ="<select name=\"campaign_id\" id=\"campaign_id\">\n";
	$html .="<option value=\"0\">-- None --</option>\n";

	foreach($campaignArray as $campaign) {
		$html .="<option value=\"".$campaign->get_campaign_id()."\"";

		if($params['value'] == $campaign->get_campaign_id()){
			$html .=" selected ";
		}

		$html .=">".$campaign->get_campaign_name()."</option>\n";
	}
	
	$html .="</select>\n";

	return $html;
}

?>