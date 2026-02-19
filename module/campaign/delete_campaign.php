<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_campaign.php<br>
	* Purpose:  delete a Single Campaign row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/campaign.class.php');

	$core->verifyAdmin();

$campaign = new campaign();

$campaign->delete_campaign($_REQUEST['campaign_id']);

$smarty->display('campaign/delete_campaign.tpl')

?>