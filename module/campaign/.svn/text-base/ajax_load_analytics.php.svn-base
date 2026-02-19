<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin();

$campaign_id 	= $_POST['campaign_id'];
require_once(CLASS_PATH."/core/campaign.class.php");
$campaignObj = new campaign();
$campaignObj->view_campaign($campaign_id);

$cost = $campaignObj->get_campaign_cost();

$total_count = $campaignObj->get_campaign_total_count($campaign_id);

$total_conversions = $campaignObj->get_campaign_total_conversions($campaign_id);

if($total_conversions > 0){
	$cost_per_conversion = $cost / $total_conversions;
}else {
	$cost_per_conversion = $cost;	
}

if($total_conversions > 0){
	$_p =  $total_conversions / $total_count;
}else{
	$_p = 0;	
}
$percent = $_p * 100;


$array = $campaignObj->load_invoice_totals_by_conversion($campaign_id);

$return = $array['total'] - $cost;

$workorder_count = $array['workorder_count'];
$total_income = $array['total'];

$smarty->assign('total_leads',$total_count);
$smarty->assign('total_conversions',$total_conversions);
$smarty->assign('campaign_cost',$cost);
$smarty->assign('cost_per_conversion',$cost_per_conversion);
$smarty->assign('coversion_percent',$percent);
$smarty->assign('workorder_count',$workorder_count);
$smarty->assign('total_income',$total_income);
$smarty->assign('roi',$return);

$smarty->display('campaign/ajax_load_analytics.tpl');



?>