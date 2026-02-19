<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   user_type modifier plugin
 *
 * Type:     modifier<br>
 * Name:     user_type<br>
 * Purpose:  convert User Type ID to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_payment_type($string) {

	require_once(CLASS_PATH."/core/payment_option.class.php");

	$paymentObj = new Payment_Option();

	$paymentObj->view_payment_option($string);
	
	$string = $paymentObj->get_payment_option_text();

	return $string;

}
?>

