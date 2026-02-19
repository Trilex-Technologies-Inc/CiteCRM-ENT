<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

require(CLASS_PATH.'/core/campaign_type.class.php');

$campaign_type = new campaign_type();
$campaign_typeArray = $campaign_type->search_campaign_type();

$smarty->assign('campaign_typeArray', $campaign_typeArray);

$smarty->display('campaign_type/ajax_load_campaign_type.tpl');
?>