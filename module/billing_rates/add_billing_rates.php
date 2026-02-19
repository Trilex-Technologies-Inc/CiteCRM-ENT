<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     add_billing_rates.php<br>
* Purpose:  Add New Billing Rates<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/billing_rates.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {

	$billing_rates = new billing_rates();

	$billing_rate_text		= $_POST['billing_rate_text'];
	$billing_rate_amount	= $_POST['billing_rate_amount'];
	$billing_rate_active	= $_POST['billing_rate_active'];
	
	$billing_rates_id = $billing_rates->add_billing_rates($billing_rate_text,$billing_rate_amount,$billing_rate_active);

} else {
	// Display the Form
	$smarty->display('billing_rates/add_billing_rates_frm.tpl');
}
?>