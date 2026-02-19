<?php
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/invoice.class.php');

$invoice_id = $_REQUEST['invoice_id'];

$invoiceObj = new invoice();

$invoiceObj->view_invoice($invoice_id);

$smarty->assign('invoiceObj', $invoiceObj);

$smarty->display('invoice/ajax_load_details.tpl');
?>