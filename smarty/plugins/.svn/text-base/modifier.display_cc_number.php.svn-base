<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   product_status modifier plugin
 *
 * Type:     modifier<br>
 * Name:     product_status<br>
 * Purpose:  convert product_status_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_display_cc_number($string) {

	require_once(CLASS_PATH."/core/payment.class.php");

    $paymentObj = new Payment();

    $string = $paymentObj->decrypt($string);

    $string = $paymentObj->safe_cc_num($string);

    return $string;


}