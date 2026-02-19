<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_billing_rates.php<br>
* Purpose:  Update a Single Billing Rates row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/billing_rates.class.php');


// If form Submission
if(isset($_POST['submit']) ) {

	$billing_rates = new billing_rates();
	
	$billing_rate_text		= $_POST['billing_rate_text'];
	$billing_rate_amount	= $_POST['billing_rate_amount'];
	$billing_rate_active	= $_POST['billing_rate_active'];
	$billing_rates_id		= $_POST['billing_rates_id'];

	$billing_rates->update_billing_rates($billing_rates_id,$billing_rate_text,$billing_rate_amount,$billing_rate_active);
	

} else {
	// Display the Form
	$billing_rates = new billing_rates();	
	$billing_rates->view_billing_rates($_POST['billing_rate_id']);
	$smarty->assign('billing_rates',$billing_rates);
	$smarty->display('billing_rates/update_billing_rates_frm.tpl');
}
?>