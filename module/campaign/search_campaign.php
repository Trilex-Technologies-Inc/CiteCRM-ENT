<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_campaign.php<br>
	* Purpose:  Search Campaign<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
require(CLASS_PATH.'/core/campaign.class.php');
$campaign = new campaign();
$campaignArray = $campaign->search_campaign();
$smarty->assign('campaignArray', $campaignArray);
$smarty->display('campaign/search_campaign.tpl');

?>