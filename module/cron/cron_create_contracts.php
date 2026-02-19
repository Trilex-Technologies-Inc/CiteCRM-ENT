<?php
//require("../../conf.php");
require(dirname(__FILE__)."/cron.conf.php");

$cronlog = dirname(__FILE__)."/cron_create_contracts_log";


// First Check if we are running
$q = "SELECT * FROM cron where cron_name = 'create_crontract' AND cron_running = '1'";

if(!$rs = $db->Execute($q)) {
    echo $db->ErrorMsg();
}

if($rs->fields['cron_running'] == '1') {
    //echo "Cron: contract_credit already Running, Started at " . date("H:i:s m-d-Y",$rs->fields['cron_start']) . "\n";
    die;
}

// Open Log and Record Start time
$start = time();
$q = "INSERT INTO cron SET cron_name = 'create_crontract', cron_start = " . $db->qstr($start) . ", cron_running = '1'";
if(!$rs = $db->Execute($q)) {
    echo $db->ErrorMsg();
}
$handle = fopen($cronlog, "a");
$msg = "Cron: create_crontract Started at " . date("H:i:s m-d-Y",$start) . "\n";
fwrite($handle, $msg);
//echo $msg;


// Load Needed Class 
require_once(CLASS_PATH."/core/invoice.class.php");
require_once(CLASS_PATH."/core/contract_to_company.class.php");
require_once(CLASS_PATH."/core/company.class.php");
require_once(CLASS_PATH."/core/autobill.class.php");
require_once(CLASS_PATH."/core/company_to_autobill.class.php");



$invoiceObj = new invoice();
$contract_to_companyObj = new contract_to_company();
$companyObj = new company();
$autobillObj = new autobill();
$company_to_autobill = new company_to_autobill();

$month = date("F", mktime(0,0,0,date("m") +1,1,date("Y")) );

// Load Active Autobills
$autobill_array = $company_to_autobill->load_active_autobill();

foreach($autobill_array as $autobill) {

    $company_id = $autobill->fields['company_id'];
    $msg = "Start Autobill for company $company_id\n";
    fwrite($handle, $msg);
    //echo $msg;

    // Load Contract
    $contract_to_companyObj->load_active_by_company($company_id);
    $contract_increament = $contract_to_companyObj->get_contract_to_company_increament();

    $contract_end_date = mktime(0,0,0,date("m",$contract_to_companyObj->get_contract_to_company_start_date()) + $contract_to_companyObj->get_contract_to_company_term() ,1,date("Y",$contract_to_companyObj->get_contract_to_company_start_date()));
    
  

    if($contract_end_date == mktime(0,0,0,date("m")+1,1,date("Y"))) {
        $msg = "Contract for Company #$company_id has expired\n";
        fwrite($handle, $msg);
        //echo $msg;
    } else {
        $msg = "Contract for Company #$company_id expires " . date("m-d-Y",$contract_end_date) . "\n";
        fwrite($handle, $msg);
        //echo $msg;

        // Grab next Bill Date
        $autobillObj->load_next_bill_date($company_id);


        // Check if Due date is 15 days or more ahead but less than the last day
        
        if($autobillObj->get_autobill_due_date() == mktime(0,0,0,date("m")+1,1,date("Y")) || $autobillObj->get_autobill_due_date() < mktime(0,0,0,date("m"),date("t"),date("Y"))) {
             $msg = "Contract for Company #$company_id is Due ".date("m-d-Y",$autobillObj->get_autobill_due_date()) ."\n";
            fwrite($handle, $msg);
            //echo $msg;
            
            $invoice_amount = $contract_to_companyObj->get_contract_to_company_amount();
            $invoice_due_date = mktime(0,0,0,date("m")+1,1,date("Y"));
            // Create Invoice
            $invoice_create_date        = time();
            $invoice_create_by          = '1';
            $invoice_due_date           = time();
            $invoice_discount_amount    = "0";
            $invoice_total_amount       = $invoice_amount;
            $invoice_status             = "Un-Paid";
            $invoice_paid_date          = time();
            $invoice_paid_amount        = "0";
            $invoice_payment_type       = "0";
            $invoice_barcode            = "";
            $invoice_payment_enter_by   = "0";
            $invoice_memo               = "Contract  for Month $month";
    
            $invoice_id = $invoiceObj->add_invoice($invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);
    
            $invoiceObj->map_company($invoice_id,$company_id);
    
            $msg = "Invoice $invocie_id created for Company #$company_id\n";
            fwrite($handle, $msg);
            //echo $msg;

            // Enter Line Item
            $invoice_item_date          = time();
            $account_type               = "company_id";
            $account_type_id            = $company_id;
            $invoice_item_type          = "Contract";
            $invoice_item_type_id       = $contract_to_companyObj->get_contract_to_company_id();
            $invoice_item_qty           = $contract_increament;
            $invoice_item_amount        = $invoice_amount;
            $invoice_item_description   = "Contract monthly rate for $month";
            $invoice_item_line_type     = "Debit";
            $invoice_item_subtotal      = $invoice_amount * $contract_increament;

            $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
            $msg = "Invoice Line Item created for Company #$company_id\n";
            fwrite($handle, $msg);
            //echo $msg;

            // reset Auto bils for company
            $company_to_autobill->clear_active($company_id);

            // Set Next Due Date Add term to curent Due Date            
            $autobill_due_date      =  mktime(0,0,0,date("m")+$contract_to_companyObj->get_contract_to_company_increament()+1 ,1,date("Y"));
            $autobill_amount        = $invoice_amount;
            $autobill_create_date   = time();
            $autobill_start_date    = mktime(0,0,0,date("m")+1,1,date("Y"));
            $autobill_status        = "new";

            $autobill_id = $autobillObj->add_autobill($invoice_id,$autobill_amount,$autobill_create_date,$autobill_start_date,$autobill_due_date,$autobill_status);
            
            $contract_to_company_id = $contract_to_companyObj->get_contract_to_company_id();

            $company_to_autobill_active = '1';

            $company_to_autobill->map_company($autobill_id,$contract_to_company_id,$company_id,$company_to_autobill_active);

            $msg = "Autobill created for Company #$company_id\n";
            fwrite($handle, $msg);
            //echo $msg;

            // Not due Yet
        } else {
            $msg = "Contract for Company #$company_id is not due till ".date("m-d-Y",$autobillObj->get_autobill_due_date()) ."\n";
            //echo $msg;
        }

    }
    

    // Save the server set the sleep time in the cron.conf.php
    sleep(CRON_SLEEP);

}

// Stop Cron and log it
$stop = time();
$q = "UPDATE cron SET cron_running = '0', cron_end = " . $db->qstr($stop) . " WHERE cron_name = 'create_crontract'";
if(!$rs = $db->Execute($q)) {
    echo $db->ErrorMsg();
}
$msg = "Cron: create_crontract End at " . date("H:i:s m-d-Y",$stop) . "\n";
fwrite($handle, $msg);
//echo $msg;

?>