<?php
$core->verifyAdmin(CAN_CREATE);

$company_id = $_GET['company_id'];

$user_id = $_GET['user_id'];

require_once(CLASS_PATH."/core/invoice.class.php");

$invoiceObj = new invoice();

if(!empty($company_id)) {

    require_once(CLASS_PATH."/core/company.class.php");

    $companyObj = new company();

    $companyObj->view_company($company_id);

   
} else {
     // Load User

}


if(isset($_POST['submit'])) {

    //print_r($_POST);

    $invoice_create_date = mktime(0,0,0,$_POST['invoice_create_dateMonth'],$_POST['invoice_create_dateDay'],$_POST['invoice_create_dateYear']);

    $invoice_create_by = $_SESSION['SESSION_USER_ID'];

    $invoice_due_date = mktime(0,0,0,$_POST['invoice_due_dateMonth'],$_POST['invoice_due_dateDay'],$_POST['invoice_due_dateYear']);

    $invoice_discount_amount = $_POST['invoice_discount_amount'];

    $invoice_discount_amount = $invoice_discount_amount * .01;

    $invoice_memo = $core->prepare_post($_POST['invoice_memo']);

    $invoice_sub_total = 0;

    // Load items and Total
    if(!empty($_POST['item'])) {
        foreach($_POST['item'] as $invoice_item_id) {
            $invoiceObj->load_invoice_item($invoice_item_id);
            $invoice_item_subtotal = $invoiceObj->fields['invoice_item_subtotal'];
            $invoice_sub_total = $invoice_sub_total + $invoice_item_subtotal;            
        }
    }

    // Calc discount
    $invoice_discount_amount = $invoice_discount_amount * $invoice_sub_total;
  
    $invoice_total_amount =  $invoice_sub_total - $invoice_discount_amount;

    $invoice_status = 'Un-Paid';
    $invoice_paid_date = '0';
    $invoice_paid_amount = '0';
    $invoice_payment_type = '0';
    $invoice_payment_enter_by = '0';

    $invoice_id = $invoiceObj->add_invoice($invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_sub_total,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

    // Map to invoice
    if(!empty($_POST['item'])) {
        foreach($_POST['item'] as $invoice_item_id) {
            $invoiceObj->map_line_item_to_invoice($invoice_item_id, $invoice_id);
        }
    }

    // Map company
    if(isset($_POST['company_id'])) {
        $invoiceObj->map_company($invoice_id,$_POST['company_id']);
    }

    print $invoice_id;

    $core->force_page(ROOT_URL.'/index.php?page=invoice:view_invoice&invoice_id='.$invoice_id);


} else {

    if(!empty($company_id)) {

        $account_type = 'company_id';

        $account_type_id = $company_id;
        
        $invoiceArray = $invoiceObj->load_invoice_items($account_type,$account_type_id);

        $smarty->assign('invoiceArray',$invoiceArray);

        $smarty->assign('companyObj',$companyObj);

        $smarty->display('invoice/new_company_invoice.tpl');


    } else {



    }



}
				

			
?>