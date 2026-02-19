<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_payment_option.php<br>
* Purpose:  Update a Single Payment Options row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/payment_option.class.php');
$payment_optionObj = new payment_option();
$payment_option_active	= $_POST['payment_option_active'];
$payment_option_id		= $_POST['payment_option_id'];

$payment_optionObj->update_payment_option($payment_option_id,$payment_option_active);

?>