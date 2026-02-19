<?php
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/invoice.class.php');

$invocieObj = new invoice();

$invoice_id = $_POST['invoice_id'];


if(isset($_POST['submit'])) {

    $invoice_id                  = $_POST['invoice_id'];
    $invoice_item_type           = $_POST['invoice_item_type'];
    $invoice_item_qty            = $_POST['invoice_item_qty'];
    $invoice_item_description    = $_POST['invoice_item_description'];
    $invoice_item_amount         = $_POST['invoice_item_amount'];
    $invoice_item_line_type      = $_POST['invoice_item_line_type'];
    $company_id                  = $_POST['company_id'];
    $user_id                     = $_POST['user_id'];

    $invoice_item_date           = time();
    $invoice_item_type_id        = 0;

    // Load Current Invoice
    $invocieObj->view_invoice($invoice_id);
    
    // Company or user
    if($company_id > 0) {
        $account_type       = 'company_id';
        $account_type_id    = $company_id;
    } else {
        $account_type       = 'user_id';
        $account_type_id    = $user_id;
    }

    // Line Item Type
    switch($invoice_item_line_type) {

        case 'Debit':
            $invoice_item_subtotal = $invoice_item_qty * $invoice_item_amount;
            
            // Add Line Item
            $invocieObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);

            // Update Invoice;
            $invoice_amount             = $invocieObj->get_invoice_amount() + $invoice_item_subtotal;
            $invoice_total_amount       = $invocieObj->get_invoice_total_amount() + $invoice_item_subtotal;

            // TODO figure out TAXs

            $invoice_create_date         = $invocieObj->get_invoice_create_date();
            $invoice_create_by           = $invocieObj->get_invoice_create_by();
            $invoice_due_date            = $invocieObj->get_invoice_due_date();
            $invoice_shipping_amount     = $invocieObj->get_invoice_shipping_amount();
            $invoice_discount_amount     = $invocieObj->get_invoice_discount_amount();
            $invoice_status              = $invocieObj->get_invoice_status();
            $invoice_paid_date           = $invocieObj->get_invoice_paid_date();
            $invoice_paid_amount         = $invocieObj->get_invoice_paid_amount();
            $invoice_payment_type        = $invocieObj->get_invoice_payment_type();
            $invoice_barcode             = $invocieObj->get_invoice_barcode();
            $invoice_payment_enter_by    = $invocieObj->get_invoice_payment_enter_by();
            $invoice_memo                = $invocieObj->get_invoice_memo();

            $invocieObj->update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

        break;

        case 'Credit':


        break;

        case 'Payment':

            print_r($_POST);

        break;


    }



} else {

    $action = $_POST['action'];

    switch($action) {
        case 'add_item':
            $smarty->display('invoice/ajax_new_line_item.tpl');
        break;
        case 'record_payment':
            $invocieObj->view_invoice($invoice_id);
            $smarty->assign('balance',$invocieObj->get_invoice_total_amount());
            $smarty->display('invoice/ajax_record_payment.tpl');
        break;

    }

    
}




?>