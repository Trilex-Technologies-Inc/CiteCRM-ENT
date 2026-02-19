<?php

/**
 * @author 
 * @copyright 2007
 */
$core->verifyAdmin(SUPER_USER);

require_once(CLASS_PATH.'/core/billing_rates.class.php');

$billing_rates = new billing_rates();

$billing_ratesArray = $billing_rates->search_billing_rates();

$smarty->assign('billing_ratesArray', $billing_ratesArray);

$smarty->display('billing_rates/ajax_load_billing_rates.tpl');
?>