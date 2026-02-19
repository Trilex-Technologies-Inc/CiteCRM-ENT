<?php
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/invoice.class.php');

$invocieObj = new invoice();

$invoice_id = $_POST['invoice_id'];

$invoice_payment_type = $_POST['invoice_payment_type'];

$invoice_item_date           = time();
$invoice_item_type_id        = 0;

// Load Current Invoice



$invocieObj->view_invoice($invoice_id);

switch($invoice_payment_type) {
    case '1': // CC Payment
    	require_once(CLASS_PATH."/core/credit_card.class.php");
    	$ccObj = new credit_card();
    
    
    	$invoice_item_line_type     = $_POST['invoice_item_line_type'];
        $invoice_paid_amount        = $_POST['invoice_paid_amount'];
        $company_id                 = $_POST['company_id'];
        $user_id                    = $_POST['user_id'];
		$cc_num						= $_POST['cc_num'];
		$cc_card_type				= $_POST['cc_card_type'];
		$ccMonth					= $_POST['ccMonth'];
		$ccYear						= $_POST['ccYear'];
		$safe_num					= $ccObj->safe_number($cc_num);
        $invoice_item_type          = 'Payment';
        $invoice_item_qty           = '1';
        $invoice_item_amount        = $invoice_paid_amount;
        $invoice_item_description   = "CC Payment #$safe_num for Invoice #$invoice_id";
        $invoice_item_line_type     = 'Payment';
        $invoice_item_subtotal      = $invoice_paid_amount;
        
        $error = false;
        $errorMsg = "<span class=\"error\">There where errors saving your Payment:</span><br>";
        if(!$ccObj->validate_cc_exp($ccMonth, $ccYear) ) {
			$errorMsg .= "<span class=\"error\">The Credit Card Expiration is Not Valid</span><br>";
			$error = true;
		}
        
        if(!$ccObj->validate_cc( $cc_num, $cc_card_type )) {
			$errorMsg .= "<span class=\"error\">The Credit Card Number is Invalid</span><br>";
			$error = true;
		}
        
        if($error){
        	$smarty->assign('error',true);
        	$smarty->assign('errorMsg',$errorMsg);
        	$smarty->display('invoice/payment_option_1.tpl');
        }else{
	        // Company or user
	        if($company_id > 0) {
	            $account_type       = 'company_id';
	            $account_type_id    = $company_id;
	        } else {
	            $account_type       = 'user_id';
	            $account_type_id    = $user_id;
	        }
			
			
	
			// Add Line Item
	        $invocieObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
	
	        if($invoice_paid_amount >= $invocieObj->get_invoice_total_amount() ) {
	           $invoice_status = 'Paid';
	        } else {
	            $invoice_status = 'Un-Paid';
	        }
		
			$invoice_balance = $invoice_paid_amount - $invocieObj->get_invoice_total_amount();
	
	        $invoice_create_date         = $invocieObj->get_invoice_create_date();
	        $invoice_create_by           = $invocieObj->get_invoice_create_by();
	        $invoice_due_date            = $invocieObj->get_invoice_due_date();
	        $invoice_amount              = $invocieObj->get_invoice_amount();
	        $invoice_shipping_amount     = $invocieObj->get_invoice_shipping_amount();
	        $invoice_discount_amount     = $invocieObj->get_invoice_discount_amount();
	        $invoice_total_amount        = $invocieObj->get_invoice_total_amount();
	        $invoice_paid_date           = time();
	        $invoice_paid_amount         = $invoice_paid_amount;
	        $invoice_payment_type        = '1';
	        $invoice_barcode             = $invocieObj->get_invoice_barcode();
	        $invoice_payment_enter_by    = $_SESSION['SESSION_USER_ID'];
	        $invoice_memo                = $invocieObj->get_invoice_memo();
	
	        $invocieObj->update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);
    
    		print "<span class=\"small\">Your Payment of $$invoice_paid_amount was recorded using Credit Card $safe_num. The invoice was marked $invoice_status leaving a balance of $$invoice_balance.</span>";
    
		}
	break;

    case '2': // Check Payment
        $invoice_item_line_type     = $_POST['invoice_item_line_type'];       
        $check_number               = $_POST['check_number'];
        $invoice_paid_amount        = $_POST['invoice_paid_amount'];
        $company_id                 = $_POST['company_id'];
        $user_id                    = $_POST['user_id'];

        $invoice_item_type          = 'Payment';
        $invoice_item_qty           = '1';
        $invoice_item_amount        = $invoice_paid_amount;
        $invoice_item_description   = "Check Payment #$check_number for Invoice #$invoice_id";
        $invoice_item_line_type     = 'Payment';
        $invoice_item_subtotal      = $invoice_paid_amount;

        // Company or user
        if($company_id > 0) {
            $account_type       = 'company_id';
            $account_type_id    = $company_id;
        } else {
            $account_type       = 'user_id';
            $account_type_id    = $user_id;
        }

        // Add Line Item
        $invocieObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_type,$invoice_item_subtotal);

        if($invoice_paid_amount >= $invocieObj->get_invoice_total_amount() ) {
           $invoice_status = 'Paid';
        } else {
            $invoice_status = 'Un-Paid';
        }



        $invoice_create_date         = $invocieObj->get_invoice_create_date();
        $invoice_create_by           = $invocieObj->get_invoice_create_by();
        $invoice_due_date            = $invocieObj->get_invoice_due_date();
        $invoice_amount              = $invocieObj->get_invoice_amount();
        $invoice_shipping_amount     = $invocieObj->get_invoice_shipping_amount();
        $invoice_discount_amount     = $invocieObj->get_invoice_discount_amount();
        $invoice_total_amount        = $invocieObj->get_invoice_total_amount();
        $invoice_paid_date           = time();
        $invoice_paid_amount         = $invoice_paid_amount;
        $invoice_payment_type        = '2';
        $invoice_barcode             = $invocieObj->get_invoice_barcode();
        $invoice_payment_enter_by    = $_SESSION['SESSION_USER_ID'];
        $invoice_memo                = $invocieObj->get_invoice_memo();

        $invocieObj->update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

        print "<span class=\"small\">Your Payment of $$invoice_paid_amount was recorded using Check #$check_number. The invoice was marked $invoice_status leaving a balance of $$invoice_balance.</span>";
    break;
    // Cash Payment
    case '3':
        $invoice_item_line_type     = $_POST['invoice_item_line_type']; 
        $invoice_paid_amount        = $_POST['invoice_paid_amount'];
        $company_id                 = $_POST['company_id'];
        $user_id                    = $_POST['user_id'];

        $invoice_item_type          = 'Payment';
        $invoice_item_qty           = '1';
        $invoice_item_amount        = $invoice_paid_amount;
        $invoice_item_description   = "Cash Payment for Invoice #$invoice_id";
        $invoice_item_line_type     = 'Payment';
        $invoice_item_subtotal      = $invoice_paid_amount;

        // Company or user
        if($company_id > 0) {
            $account_type       = 'company_id';
            $account_type_id    = $company_id;
        } else {
            $account_type       = 'user_id';
            $account_type_id    = $user_id;
        }

        $invoice_balance = $invoice_paid_amount - $invocieObj->get_invoice_total_amount();

        // Add Line Item
        $invocieObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_type,$invoice_item_subtotal);

        if($invoice_paid_amount >= $invocieObj->get_invoice_total_amount() ) {
           $invoice_status = 'Paid';
        } else {
            $invoice_status = 'Un-Paid';
        }



        $invoice_create_date         = $invocieObj->get_invoice_create_date();
        $invoice_create_by           = $invocieObj->get_invoice_create_by();
        $invoice_due_date            = $invocieObj->get_invoice_due_date();
        $invoice_amount              = $invocieObj->get_invoice_amount();
        $invoice_shipping_amount     = $invocieObj->get_invoice_shipping_amount();
        $invoice_discount_amount     = $invocieObj->get_invoice_discount_amount();
        $invoice_total_amount        = $invocieObj->get_invoice_total_amount();
        $invoice_paid_date           = time();
        $invoice_paid_amount         = $invoice_paid_amount;
        $invoice_payment_type        = '3';
        $invoice_barcode             = $invocieObj->get_invoice_barcode();
        $invoice_payment_enter_by    = $_SESSION['SESSION_USER_ID'];
        $invoice_memo                = $invocieObj->get_invoice_memo();

        $invocieObj->update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

        print "<span class=\"small\">Your Payment of $$invoice_paid_amount was recorded using Cash Payment. The invoice was marked $invoice_status leaving a balance of $$invoice_balance.</span>";
    

    break;
    // Gift Certificate
    case '4':
    
    	$invoice_item_line_type     = $_POST['invoice_item_line_type']; 
        $invoice_paid_amount        = $_POST['invoice_paid_amount'];
        $company_id                 = $_POST['company_id'];
        $user_id                    = $_POST['user_id'];
		$gift_certificate_id		= $_POST['gift_certificate_id'];
        $invoice_item_type          = 'Payment';
        $invoice_item_qty           = '1';
        $invoice_item_amount        = $invoice_paid_amount;
        $invoice_item_description   = "Gift Certificate Payment #$gift_certificate_id for Invoice #$invoice_id";
        $invoice_item_line_type     = 'Payment';
        $invoice_item_subtotal      = $invoice_paid_amount;

        // Company or user
        if($company_id > 0) {
            $account_type       = 'company_id';
            $account_type_id    = $company_id;
        } else {
            $account_type       = 'user_id';
            $account_type_id    = $user_id;
        }

        $invoice_balance = $invoice_paid_amount - $invocieObj->get_invoice_total_amount();

        // Add Line Item
        $invocieObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_type,$invoice_item_subtotal);

        if($invoice_paid_amount >= $invocieObj->get_invoice_total_amount() ) {
           $invoice_status = 'Paid';
        } else {
            $invoice_status = 'Un-Paid';
        }



        $invoice_create_date         = $invocieObj->get_invoice_create_date();
        $invoice_create_by           = $invocieObj->get_invoice_create_by();
        $invoice_due_date            = $invocieObj->get_invoice_due_date();
        $invoice_amount              = $invocieObj->get_invoice_amount();
        $invoice_shipping_amount     = $invocieObj->get_invoice_shipping_amount();
        $invoice_discount_amount     = $invocieObj->get_invoice_discount_amount();
        $invoice_total_amount        = $invocieObj->get_invoice_total_amount();
        $invoice_paid_date           = time();
        $invoice_paid_amount         = $invoice_paid_amount;
        $invoice_payment_type        = '4';
        $invoice_barcode             = $invocieObj->get_invoice_barcode();
        $invoice_payment_enter_by    = $_SESSION['SESSION_USER_ID'];
        $invoice_memo                = $invocieObj->get_invoice_memo();

        $invocieObj->update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

        print "<span class=\"small\">Your Payment of $$invoice_paid_amount was recorded using Gift Certificate #$gift_certificate_id. The invoice was marked $invoice_status leaving a balance of $$invoice_balance.</span>";
    
    break;
    // Paypal
    case '5':

    
    	$invoice_item_line_type     = $_POST['invoice_item_line_type']; 
        $invoice_paid_amount        = $_POST['invoice_paid_amount'];
        $company_id                 = $_POST['company_id'];
        $user_id                    = $_POST['user_id'];
		$paypal_email				= $_POST['paypal_email'];
        $invoice_item_type          = 'Payment';
        $invoice_item_qty           = '1';
        $invoice_item_amount        = $invoice_paid_amount;
        $invoice_item_description   = "PayPal Payment for user $paypal_email for Invoice #$invoice_id";
        $invoice_item_line_type     = 'Payment';
        $invoice_item_subtotal      = $invoice_paid_amount;

        // Company or user
        if($company_id > 0) {
            $account_type       = 'company_id';
            $account_type_id    = $company_id;
        } else {
            $account_type       = 'user_id';
            $account_type_id    = $user_id;
        }

        $invoice_balance = $invoice_paid_amount - $invocieObj->get_invoice_total_amount();

        // Add Line Item
        $invocieObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_type,$invoice_item_subtotal);

        if($invoice_paid_amount >= $invocieObj->get_invoice_total_amount() ) {
           $invoice_status = 'Paid';
        } else {
            $invoice_status = 'Un-Paid';
        }



        $invoice_create_date         = $invocieObj->get_invoice_create_date();
        $invoice_create_by           = $invocieObj->get_invoice_create_by();
        $invoice_due_date            = $invocieObj->get_invoice_due_date();
        $invoice_amount              = $invocieObj->get_invoice_amount();
        $invoice_shipping_amount     = $invocieObj->get_invoice_shipping_amount();
        $invoice_discount_amount     = $invocieObj->get_invoice_discount_amount();
        $invoice_total_amount        = $invocieObj->get_invoice_total_amount();
        $invoice_paid_date           = time();
        $invoice_paid_amount         = $invoice_paid_amount;
        $invoice_payment_type        = '5';
        $invoice_barcode             = $invocieObj->get_invoice_barcode();
        $invoice_payment_enter_by    = $_SESSION['SESSION_USER_ID'];
        $invoice_memo                = $invocieObj->get_invoice_memo();

        $invocieObj->update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

        print "<span class=\"small\">Your Payment of $$invoice_paid_amount was recorded using PayPal $paypal_email. The invoice was marked $invoice_status leaving a balance of $$invoice_balance.</span>";
    
    break;

}




?>