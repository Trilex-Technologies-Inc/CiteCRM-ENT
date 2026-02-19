<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_billing_rates.php<br>
* Purpose:  Search Billing Rates<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);
$smarty->display('billing_rates/search_billing_rates.tpl');
?>