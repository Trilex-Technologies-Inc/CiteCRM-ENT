<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_billing_rates.php<br>
* Purpose:  delete a Single Billing Rates row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/billing_rates.class.php');

$billing_rates = new billing_rates();

$billing_rates->delete_billing_rates($_POST['billing_rates_id']);


?>