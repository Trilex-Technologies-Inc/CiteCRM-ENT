<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin();

$campaign_id 	= $_POST['campaign_id'];
$lead_status	= $_POST['lead_status'];

switch ($lead_status) {
	
	case 'open_leads':
		require_once(CLASS_PATH."/core/lead.class.php");
		$leadObj = new lead();
		
		$leadArray = $leadObj->load_open_leads($campaign_id);
		$smarty->assign('lead_status','open_leads');
		$smarty->assign('leadArray',$leadArray);
		$smarty->display('campaign/ajax_load_lead_by_status.tpl');
	
	break;
	case 'conversions':
		require_once(CLASS_PATH."/core/lead.class.php");
		$leadObj = new lead();
		$smarty->assign('lead_status','conversions');
		$leadArray = $leadObj->load_converted($campaign_id);
		$smarty->assign('leadArray',$leadArray);
		$smarty->display('campaign/ajax_load_lead_converted.tpl');
	break;
		

}


?>