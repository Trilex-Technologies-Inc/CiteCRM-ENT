<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {fetch_workorder_status} function plugin
 *
 * Type:     function<br>
 * Name:     fetch_workorder_status<br>
 * Purpose:  Fetches workorder status and returns array
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_load_payment_details($params, &$smarty) {

	require_once(CLASS_PATH."/core/payment.class.php");

    $paymentObj = new Payment();
    
    $paymentObj->load_payment_by_invoice($params['invoice_id'],$params['payment_type']);


    switch($params['payment_type']) {

        // CC Card
        case "1":

            $cc_num = $paymentObj->decrypt($paymentObj->get_cc_payment_number());

            $cc_num = $paymentObj->safe_cc_num($cc_num);

            $html = "<b>Number: </b> " . $cc_num ."<br><b>Expr: </b>" . $paymentObj->get_cc_payment_expirdate() . "<br><b>Status: </b>" . $paymentObj->get_cc_payment_status() . "<br><b>Attempts: </b>" . $paymentObj->get_cc_payment_billing_attempt() . "<br>" ;
        break;

        // Check
        case "2":
            $html = "<b>Check Number: </b>" . $paymentObj->get_check_payment_number() . "<br><b>Status: </b>" . $paymentObj->get_check_payment_status();
        break;


    }



    return $html;
    

}