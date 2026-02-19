<?php
/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_campaign.php<br>
	* Purpose:  View a Single Campaign row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
*/
$core->verifyAdmin();
require(CLASS_PATH.'/core/campaign.class.php');

$campaign_id = $_REQUEST['campaign_id'];
$campaignObj = new campaign();
$campaignObj->view_campaign($campaign_id);
$smarty->assign('campaignObj', $campaignObj);
$smarty->display('campaign/view_campaign.tpl');

?>