<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_payment.php<br>
 * Purpose:  Loads Payment informatiom for Invoice<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

require_once(CLASS_PATH."/core/payment.class.php");

$paymentObj = new Payment();

$invoice_id     = $_POST['invoice_id'];
$payment_type   = $_POST['payment_type'];


$paymentObj->load_payment_by_invoice($invoice_id,$payment_type);

$smarty->assign('paymentObj',$paymentObj);

switch($payment_type) {

    case "1":
        $smarty->display('invoice/cc_payment.tpl');
    break;

    case "2":
        $smarty->display('invoice/check_payment.tpl');
    break;


}

?>