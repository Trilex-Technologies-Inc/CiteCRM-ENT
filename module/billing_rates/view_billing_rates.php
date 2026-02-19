<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_billing_rates.php<br>
* Purpose:  View a Single Billing Rates row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/billing_rates.class.php');

$billing_rates = new billing_rates();

$billing_rates->view_billing_rates($_REQUEST['billing_rates_id']);

$smarty->assign('billing_rates', $billing_rates);

$smarty->display('billing_rates/view_billing_rates.tpl');

?>