<?php

/**
 * @author 
 * @copyright 2007
 */
$core->verifyAdmin(SUPER_USER);
require_once(CLASS_PATH."/core/lead_status.class.php");
$lead_statusObj = new lead_status();

$lead_statusArray = $lead_statusObj->search_lead_status();

$smarty->assign('lead_statusArray',$lead_statusArray);

$smarty->display('lead_status/ajax_load_lead_status.tpl');

?>