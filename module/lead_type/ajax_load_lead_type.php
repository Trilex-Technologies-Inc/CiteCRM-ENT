<?php

/**
 * @author 
 * @copyright 2007
 */
$core->verifyAdmin(SUPER_USER);
require(CLASS_PATH.'/core/lead_type.class.php');

$lead_type  = new lead_type();

$lead_typeArray = $lead_type->search_lead_type();

$smarty->assign('lead_typeArray', $lead_typeArray);

$smarty->display('lead_type/ajax_load_lead_type.tpl');

?>