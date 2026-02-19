<?php
//require("../../conf.php");
require(dirname(__FILE__)."/cron.conf.php");

$cronlog = dirname(__FILE__)."/cron_credit_contracts_log";

// First Check if we are running
$q = "SELECT * FROM cron where cron_name = 'contract_credit' AND cron_running = '1'";

if(!$rs = $db->Execute($q)) {
    //echo $db->ErrorMsg();
}

if($rs->fields['cron_running'] == '1') {
    //echo "Cron: contract_credit already Running, Started at " . date("H:i:s m-d-Y",$rs->fields['cron_start']) . "\n";
    die;
}

// Open Log and Record Start time
$start = time();
$q = "INSERT INTO cron SET cron_name = 'contract_credit', cron_start = " . $db->qstr($start) . ", cron_running = '1'";
if(!$rs = $db->Execute($q)) {
    //echo $db->ErrorMsg();
}
$handle = fopen($cronlog, "a");
$msg = "Cron: contract_credit Started at " . date("H:i:s m-d-Y",$start) . "\n";
fwrite($handle, $msg);
//echo $msg;

// Load Needed Class 
require_once(CLASS_PATH."/core/invoice.class.php");
require_once(CLASS_PATH."/core/contract_to_company.class.php");
require_once(CLASS_PATH."/core/company.class.php");

$invoiceObj = new invoice();
$contract_to_companyObj = new contract_to_company();
$companyObj = new company();

$month = date("M");

$start_date = mktime(0,0,0,date("m") -1,1,date("Y"));

$end_date   = mktime(23,59,59,date("m") -1,date("t"),date("Y"));


$cur_month = date("M",$start_date);

// Load All Contract Companies  
$contract_array = $contract_to_companyObj->load_all_active();
$total_contracts = count($contract_array);
$msg = "Processing $total_contracts contracts for " . date("H:i:s m-d-Y",$start_date) . " to " . date("H:i:s m-d-Y",$end_date) . "\n";
fwrite($handle, $msg);
//echo $msg;

// Loop through Each Contract and process it

foreach($contract_array as  $contract) {
    $company_id = $contract->get_company_id();
    $msg = "Starting Contract #" . $contract->get_contract_to_company_id() . " for company $company_id\n";
    fwrite($handle, $msg);
    //echo $msg;

    // Get total Labor Count for the month
    $start_date = mktime(0,0,0,date("m") -1,1,date("Y"));
    $end_date = mktime(0,0,0,date("m") -1,date("t"),date("Y"));

    $total_labor = $contract->load_contract_hours_for_credit($company_id,$start_date,$end_date);
    
    $contract_labor = $contract->get_contract_to_company_covered_labor();
    
    $contract_credit_rate = $contract->get_contract_to_company_covered_labor_rate();
    
    print $total_labor ."<br>";

    $msg = "Company #$company_id has $total_labor hours labor for ".date("H:i:s m-d-Y",$start_date)." to ".date("H:i:s m-d-Y",$end_date).". Contract is for $contract_labor hours labor\n";
    fwrite($handle, $msg);
    //echo $msg;

    if($total_labor < 1) {
        $msg = "Company #$company_id has no time to Credit, skipping\n";
        fwrite($handle, $msg);
        //echo $msg;
    } else {
		
        // Create Invoice
        $invoice_create_date        = time();
        $invoice_create_by          = '1';
        $invoice_due_date           = time();
        $invoice_amount             = "0.00";
        $invoice_discount_amount    = "0";
        $invoice_total_amount       = "0.00";
        $invoice_status             = "Paid";
        $invoice_paid_date          = time();
        $invoice_paid_amount        = "0.00";
        $invoice_payment_type       = "7";
        $invoice_barcode            = "";
        $invoice_payment_enter_by   = "1";
        $invoice_memo               = "Contract Credit for Month $cur_month";

        $invoice_id = $invoiceObj->add_invoice($invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

        $invoiceObj->map_company($invocie_id,$company_id);

        $msg = "Invoice $invocie_id created for Company #$company_id\n";
        fwrite($handle, $msg);
        //echo $msg;
        
        // calc labor to be credited
        if($contract_labor > $total_labor) {
            $invoice_id                 = $invoice_id;
            $invoice_item_date          = time();
            $account_type               = "company_id";
            $account_type_id            = $company_id;
            $invoice_item_type          = "Credit";
            $invoice_item_type_id       = "";
            $invoice_item_qty           = $total_labor;
            $invoice_item_amount        = $contract_credit_rate;
            $invoice_item_description   = "Contract Monthly Labor Credit for $cur_month";
            $invoice_item_line_type     = "Credit";
            $invoice_item_subtotal      = $total_labor * $contract_credit_rate;

            $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);

            $msg = "Credit $total_labor hours labor @ $$contract_credit_rate per hour\n";
            fwrite($handle, $msg);
            //echo $msg;
            
        } else {
            $invoice_id                 = $invoice_id;
            $invoice_item_date          = time();
            $account_type               = "company_id";
            $account_type_id            = $company_id;
            $invoice_item_type          = "Credit";
            $invoice_item_type_id       = "";
            $invoice_item_qty           = $contract_labor;
            $invoice_item_amount        = $contract_credit_rate;
            $invoice_item_description   = "Contract Monthly Labor Credit for $cur_month";
            $invoice_item_line_type     = "Credit";
            $invoice_item_subtotal      = $contract_labor * $contract_credit_rate;

            $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);


            $msg = "Credit $contract_labor hours labor @ $$contract_credit_rate per hour\n";
            fwrite($handle, $msg);
            //echo $msg;
        }

    }

    // Map Contract Hours to Invoice
    $invoiceObj->map_contract_hours_to_invoice($company_id,$invoice_id,$start_date,$end_date);

    // Calculate support Time
    $support_min_total = $contract->load_call_min_by_month($company_id);
    $contract_min = $contract->get_contract_to_company_call_min();
    $contract_min_amount = $contract->get_contract_to_company_call_covered_rate();
    

   
    // If no minuttes skip;
    if($support_min_total < 1) {
        $msg = "Company #$company_id has no support minutes this month, $cur_month Skipping\n";
        fwrite($handle, $msg);
        //echo $msg;
    } else {
    
         // IF no invoice from labor create one now
        if($invoice_id == "") {
            $invoice_create_date        = time();
            $invoice_create_by          = '1';
            $invoice_due_date           = time();
            $invoice_amount             = "0.00";
            $invoice_discount_amount    = "0";
            $invoice_total_amount       = "0.00";
            $invoice_status             = "Paid";
            $invoice_paid_date          = time();
            $invoice_paid_amount        = "0.00";
            $invoice_payment_type       = "7";
            $invoice_barcode            = "";
            $invoice_payment_enter_by   = "1";
            $invoice_memo               = "Contract Credit for Month $cur_month";
    
            $invoice_id = $invoiceObj->add_invoice($invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);
    
            $invoiceObj->map_company($invoice_id,$company_id);
            $msg = "Invoice #$invoice_id created for Company #$company_id\n";
            fwrite($handle, $msg);
            //echo $msg;
        }
        
        // If min over contract
        if($support_min_total >= $contract_min) {
             $invoice_id                 = $invoice_id;
             $invoice_item_date          = time();
             $account_type               = "company_id";
             $account_type_id            = $company_id;
             $invoice_item_type          = "Credit";
             $invoice_item_type_id       = "";
             $invoice_item_qty           = $contract_min;
             $invoice_item_amount        = $contract_min_amount;
             $invoice_item_description   = "Contract Monthly Support Minutes Credit for $cur_month";
             $invoice_item_line_type     = "Credit";
             $invoice_item_subtotal      = $contract_min * $contract_min_amount;

             $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);

            $msg = "Credit $contract_min support minutes @ $contract_min_amount per minute\n";
            fwrite($handle, $msg);
            //echo $msg;

        } else {
             $invoice_id                 = $invoice_id;
             $invoice_item_date          = time();
             $account_type               = "company_id";
             $account_type_id            = $company_id;
             $invoice_item_type          = "Credit";
             $invoice_item_type_id       = "";
             $invoice_item_qty           = $support_min_total;
             $invoice_item_amount        = $contract_min_amount;
             $invoice_item_description   = "Contract Monthly Support Minutes Credit for $cur_month";
             $invoice_item_line_type     = "Credit";
             $invoice_item_subtotal      = $support_min_total * $contract_min_amount;

             $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);

            $msg = "Credit $support_min_total support minutes @ $contract_min_amount per minute\n";
            fwrite($handle, $msg);
            //echo $msg;

        }


    }
    
    // Map Contract Minutes to Invoice
     $invoiceObj->map_contract_min_to_invoice($company_id,$invoice_id,$start_date,$end_date);

    // Save the server set the sleep time in the cron.conf.php
    sleep(CRON_SLEEP);

    // Done
    $msg = "Completed Contract #" . $contract->get_contract_to_company_id() . " for company $company_id\n";
    fwrite($handle, $msg);
    //echo $msg;
}


// Stop Cron and log it
$stop = time();
$q = "UPDATE cron SET cron_running = '0', cron_end = " . $db->qstr($stop) . " WHERE cron_name = 'contract_credit'";
if(!$rs = $db->Execute($q)) {
    //echo $db->ErrorMsg();
}
$msg = "Cron: contract_credit End at " . date("H:i:s m-d-Y",$stop) . "\n";
fwrite($handle, $msg);
//echo $msg;
?>