<?php

$core->verifyAdmin();
require(CLASS_PATH.'/core/campaign.class.php');



$campaign_id = $_POST['campaign_id'];
$campaignObj = new campaign();
$campaignObj->view_campaign($campaign_id);

$smarty->assign('campaignObj', $campaignObj);   
$smarty->display('campaign/ajax_load_campaign_details.tpl');
?>