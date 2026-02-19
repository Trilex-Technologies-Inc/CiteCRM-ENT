<?php

/**
 * @author 
 * @copyright 2007
 */

require(CLASS_PATH.'/core/payment_option.class.php');

$payment_option = new payment_option();

$payment_optionArray = $payment_option->search_payment_option();

$smarty->assign('payment_optionArray', $payment_optionArray);

$smarty->display('payment_option/ajax_load_payment_options.tpl');

?>