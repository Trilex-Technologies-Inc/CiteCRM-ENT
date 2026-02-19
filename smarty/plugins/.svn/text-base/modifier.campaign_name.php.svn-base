<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   workorder_status modifier plugin
 *
 * Type:     modifier<br>
 * Name:     system_model_name<br>
 * Purpose:  convert operating_system_manufacture_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_campaign_name($string) {

	require_once(CLASS_PATH."/core/campaign.class.php");

	$campaignObj = new campaign();

	$campaignObj->view_campaign($string);

	$string = $campaignObj->get_campaign_name();

	return $string;

}
?>