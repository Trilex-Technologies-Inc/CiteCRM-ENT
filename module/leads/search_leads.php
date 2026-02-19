<?php
$core->verifyAdmin();
require_once(CLASS_PATH."/core/lead.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$leadObj = new lead();

$smarty->display('leads/search_leads.tpl');

$core->log_action($_SESSION['SESSION_USER_ID'],'Search','Searched Leads');

?>