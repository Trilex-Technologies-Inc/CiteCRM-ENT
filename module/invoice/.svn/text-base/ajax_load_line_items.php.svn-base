<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/invoice.class.php");

$invoiceObj = new invoice();

$invoice_id = $_POST['invoice_id'];

$invoice_item_array = $invoiceObj->load_items_by_invoice($invoice_id);

$smarty->assign('invoice_item_array',$invoice_item_array);


$invoice_credits_array = $invoiceObj->load_credits($invoice_id);

$invoiceObj->view_invoice($invoice_id);

$balance = $invoiceObj->get_invoice_total_amount() - $invoiceObj->get_invoice_paid_amount();


$smarty->assign('invoice_credits_array',$invoice_credits_array);

$smarty->assign('balance',$balance);

$smarty->assign('invoiceObj',$invoiceObj);

$smarty->display('invoice/ajax_load_line_items.tpl');

?>