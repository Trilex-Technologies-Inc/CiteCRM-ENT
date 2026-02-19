<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_workorder.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$payment_type = $_POST['invoice_payment_type'];
/*
    1 = Credit Card Payment
    2 = Check
    3 = Cash
    4 = Gift Certificate
    5 = Paypal
*/



switch($payment_type) {

    // Credit Card
    case "1":

        $error = false;

        require_once(CLASS_PATH."/core/credit_card.class.php");
        require_once(CLASS_PATH."/core/cc_payment.class.php");
        require_once(CLASS_PATH."/core/invoice.class.php");
        require_once(CLASS_PATH."/core/workorder.class.php");

        $ccObj          = new Credit_Card();
        $cc_paymentObj  = new cc_payment();
        $invoiceObj     = new Invoice();
        $workorderObj   = new Workorder();

        $cc_payment_number      = $_POST['cc_number'];
        $expirDateMonth 		= $_POST['expirDateMonth'];
        $expirDateYear  		= $_POST['expirDateYear'];
		$cc_card_type			= $_POST['cc_card_type'];
		$invocie_id				= $_POST['invoice_id'];	
		$cc_payment_amount	    = $_POST['invoice_paid_amount'];
        $workorder_id           = $_POST['workorder_id'];

		// Format Date
		$cc_payment_expirdate = $expirDateMonth . $expirDateYear;

        // Validate Expire Date
        if(!$ccObj->validate_cc_exp($expirDateMonth, $expirDateYear)) {
            $error = true;
            $errorMsg = "The Credit Expiration date failed validation<br>";
        }


        // Validate Number
		if(!$ccObj->validate_cc($cc_payment_number, $cc_card_type)) {
			$error = true;
            $errorMsg = "The Credit Number failed validation<br>";

		}


        if($error == true) {
            $smarty->assign('errorOccurred',true);
            $smarty->assign('errorMsg',$errorMsg);
            $smarty->assign('invoice_total_amount',$cc_payment_amount);
            $smarty->display('payment_option/cc_card_error.tpl');

        } else {
            
            // record cc Payment
            $cc_payment_enter_by        = $_SESSION['SESSION_USER_ID'];
            $cc_payment_billing_attempt = 0;
            $cc_payment_status          = 'Pending';
            $cc_payment_date            = time();
            $cc_payment_date_proc       = 0;
    
          

            $cc_payment_number = $core->encrypt($cc_payment_number);

           
            $cc_paymentObj->add_cc_payment($invoice_id,
                                            $cc_payment_amount,
                                            $cc_payment_number,
                                            $cc_payment_expirdate,
                                            $cc_payment_enter_by,
                                            $cc_payment_billing_attempt,
                                            $cc_payment_status,
                                            $cc_payment_date,
                                            $cc_payment_date_proc);

            //Set Invoice to Paid
            
            $invoice_status             = 'Pending';
            $invoice_paid_date          = time();
            $invoice_payment_type       = 1;
            $invoice_payment_enter_by   = $_SESSION['SESSION_USER_ID'];
            $invoice_paid_amount        = $cc_payment_amount;

            $invoiceObj->set_paid($invoice_id,
                                    $invoice_status,
                                    $invoice_paid_date,
                                    $invoice_payment_type,
                                    $invoice_payment_enter_by,
                                    $invoice_paid_amount);


            // Update Workorder Complete
            $workorderObj->set_completed($workorder_id);            

            //$smarty->display('payment_option/cc_card_result.tpl');

        }
    break;

    // Check
    case "2":


        $error = false;

        require_once(CLASS_PATH."/core/invoice.class.php");
        require_once(CLASS_PATH."/core/workorder.class.php");
        require_once(CLASS_PATH."/core/payment.class.php");
        require_once(CLASS_PATH."/core/check_payment.class.php");

        $invoiceObj     = new Invoice();
        $workorderObj   = new Workorder();
        $paymentObj     = new Payment();
        $checkObj       = new Check_Payment();

        $invocie_id	            = $_POST['invoice_id'];	
		$check_payment_amount	= $_POST['invoice_paid_amount'];
        $workorder_id           = $_POST['workorder_id'];
        $check_payment_number   = $_POST['check_number'];
        $check_payment_enter_by = $_SESSION['SESSION_USER_ID'];
        $check_payment_date     = time();
        $check_payment_status   = "Sucsess";

        // Validate Check Number
        if(!$paymentObj->validate_check_number($check_payment_number)) {
            $error = true;
            $errorMsg = "Please enter a Check Number.<br>";
        }

        // Validate Payment
        if(!$paymentObj->is_currency($check_payment_amount)){
            $error = true;
            $errorMsg = "Please enter a valid Amount.<br>";
        }


        if($error == true) {
            $smarty->assign('errorOccurred',true);
            $smarty->assign('errorMsg',$errorMsg);
            $smarty->assign('invoice_total_amount',$check_payment_amount);
            $smarty->display('payment_option/check_error.tpl');

        } else {

            $checkObj->add_check_payment($invoice_id,
                $check_payment_amount,  
                $check_payment_number,
                $check_payment_enter_by,
                $check_payment_date,
                $check_payment_status);

            

            $invoice_status             = 'Paid';
            $invoice_paid_date          = time();
            $invoice_payment_type       = 2;
            $invoice_payment_enter_by   = $_SESSION['SESSION_USER_ID'];
            $invoice_paid_amount        = $check_payment_amount;

            $invoiceObj->set_paid($invoice_id,
                                    $invoice_status,
                                    $invoice_paid_date,
                                    $invoice_payment_type,
                                    $invoice_payment_enter_by,
                                    $invoice_paid_amount);

            // Update Workorder Complete
            $workorderObj->set_completed($workorder_id);
    
            $workorderObj->close($workorder_id);

        }



    break;

    // Cash
    case "3":

    break;

    // Gift Certificate
    case "4":

    break;

    // Paypal
    case "5":

    break;


}


 
//print_r($_REQUEST);

?>