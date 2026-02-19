<?php
$core->verifyAdmin(CAN_READ);

$contract_type_id = $_POST['contract_type_id'];


if(isset($_POST['submit'])) {
	require_once(CLASS_PATH.'/core/contract_to_company.class.php');
	require_once(CLASS_PATH."/core/invoice.class.php");
	require_once(CLASS_PATH.'/core/autobill.class.php');
	require_once(CLASS_PATH.'/core/company_to_autobill.class.php');

	$contract_to_companyObj = new contract_to_company();
	$invoiceObj 			= new invoice();
	$autobillObj			= new autobill();
	$company_to_autobillObj = new company_to_autobill();


	// Post vars
	$company_id						            = $_POST['company_id'];
	$contract_type_id				            = $_POST['contract_type_id'];
	$contract_to_company_start_date	            = $_POST['contract_to_company_start_date'];
	$contract_to_company_amount		            = $_POST['contract_to_company_amount'];
	$contract_to_company_term		            = $_POST['contract_to_company_term'];
	$contract_to_company_increament	            = $_POST['contract_to_company_increament'];
	$contract_to_company_covered_labor          = $_POST['contract_to_company_covered_labor'];
    $contract_to_company_covered_labor_rate     = $_POST['contract_to_company_covered_labor_rate'];     
    $contract_to_company_non_covered_labor_rate = $_POST['contract_to_company_non_covered_labor_rate'];
    $contract_to_company_call_min               = $_POST['contract_to_company_call_min'];
    $contract_to_company_call_covered_rate      = $_POST['contract_to_company_call_covered_rate'];
    $contract_to_company_call_non_covered_rate  = $_POST['contract_to_company_call_non_covered_rate'];


	// fix the start date incase some one screws up the format
	$contract_to_company_start_date = preg_replace("/^\s*([0-9]{1,2})[\/\. -]+([0-9]{1,2})[\/\. -]+([0-9]{1,4})/", "\\1/\\2/\\3", $contract_to_company_start_date);
	$contract_to_company_start_date = strtotime($contract_to_company_start_date);

	$contract_to_company_active = 1;

	$contract_to_company_id = $contract_to_companyObj->add_company_contract($contract_type_id,$company_id,$contract_to_company_active,$contract_to_company_start_date,$contract_to_company_term,$contract_to_company_increament,$contract_to_company_amount,$contract_to_company_covered_labor,$contract_to_company_covered_labor_rate,$contract_to_company_non_covered_labor_rate,$contract_to_company_call_min,$contract_to_company_call_covered_rate,$contract_to_company_call_non_covered_rate);


	// If billing first of month enabled
	if(BILL_FIRST_OF_MONTH) {
	
		$startDay = date("d",$contract_to_company_start_date);
		
		// Last Day of the month
		$endDay =  strtotime(date('Y/m/d',strtotime('-1 second',strtotime('+1 month',strtotime(date('m',$contract_to_company_start_date).'/01/'.date('Y').' 00:00:00')))) );
		$endDay = date("d",$endDay);
	
		// Calc num days left in month
		$numDays = $endDay - $startDay +1;
	
		// Price per day for prorate
		$pricePerDay = $contract_to_company_amount / 30;	
		$pricePerDay = $core->n_round($pricePerDay, 2);
	
		// Less than 1 month pro rate + full month
		if($contract_to_company_increament == 1) {		
			if($numDays < 30) {
				$prorate = $numDays * $pricePerDay ;
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);			
				$billEndDate = mktime(0,0,0,date("m",$ts) + 2,1,date("Y",$ts));							 
				$total = $prorate + $contract_to_company_amount;
				$numMonths = 1;
				$contractTotal = $contract_to_company_amount * $numMonths;
			} else {
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);
				$billEndDate  = mktime(0,0,0,date("m",$ts) + 1,1,date("Y",$ts));
				$total = $contract_to_company_amount;
				$numMonths = 1;
				$contractTotal = $contract_to_company_amount * $numMonths;
			}	
		}
	
		// Quarter Billing prorate plus 2 months
		if($contract_to_company_increament == 3) {		
			if($numDays < 30) {
				$prorate = $numDays * $pricePerDay;
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);
				$billEndDate = mktime(0,0,0,date("m",$ts) + 3,1,date("Y",$ts));	
				$total = $prorate + ($contract_to_company_amount * 2 );
				$numMonths = 2;
				$contractTotal = $contract_to_company_amount * $numMonths;
			} else {
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);
				$billEndDate = mktime(0,0,0,date("m",$ts) + 3,1,date("Y",$ts));
				$total = $contract_to_company_amount * 3;
				$numMonths = 3;
				$contractTotal = $contract_to_company_amount * $numMonths;
			}
		}
	
		// Bi Yearly prorate one month + 5
		if($contract_to_company_increament == 6) {
			if($numDays < 30) {
				$prorate = $numDays * $pricePerDay;
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);
				$billEndDate = mktime(0,0,0,date("m",$ts) + 6,1,date("Y",$ts));	
				$total = $prorate + ($contract_to_company_amount * 5 );
				$numMonths = 5;
				$contractTotal = $contract_to_company_amount * $numMonths;
			} else {
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);
				$billEndDate =  mktime(0,0,0,date("m",$ts) + 6,1,date("Y",$ts));
				$total = $contract_to_company_amount * 6;
				$numMonths = 6;
				$contractTotal = $contract_to_company_amount * $numMonths;
			}
		}
		
		// Yearly 
		if($contract_to_company_increament == 12) {
			if($numDays < 30) {
				$prorate = $numDays * $pricePerDay;
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);
				$billEndDate =  mktime(0,0,0,date("m",$ts) + 12,1,date("Y",$ts));
				$total = $prorate + ($contract_to_company_amount * 11 );
				$numMonths = 11;
				$contractTotal = $contract_to_company_amount * $numMonths;
			} else {
				$ts = mktime(0,0,0,date("m",$contract_to_company_start_date),date("d",$contract_to_company_start_date ),date("Y"),$contract_to_company_start_date);
				$billEndDate =  mktime(0,0,0,date("m",$ts) + 12,1,date("Y",$ts));
				$total = $contract_to_company_amount * 12;
				$numMonths = 12;
				$contractTotal = $contract_to_company_amount * $numMonths;
			}
		}

	// Bill on ann
	} else {

	}


	// Contract Amount
    $invoice_id                 = 0;
    $account_type               = 'company_id';
    $account_type_id            = $company_id;
    $invoice_item_type          = 'Contract';  
    $invoice_item_type_id       = $contract_to_company_id;	
	$invoice_item_qty			= $numMonths;
	$invoice_item_amount		= $contract_to_company_amount;
    $invoice_item_description	= "Contract: $" . $contract_to_company_amount . " @ ".$numMonths." Months.";
    $invoice_item_line_type     = 'Debit';
	$invoice_item_subtotal		= $contractTotal;
    $invoice_item_date          = time();

    $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
                              

	
	// Contract Prorate
	if($prorate > 0 ) {
        $invoice_id                 = 0;
        $account_type               = 'company_id';
        $account_type_id            = $company_id;
        $invoice_item_type          = 'Contract';  
        $invoice_item_type_id       = $contract_to_company_id;
        $invoice_item_qty			= 1;
        $invoice_item_amount		= $prorate;
		$invoice_item_description	= "Prorate: " . $numDays ." days @ $".$pricePerDay;		
		$invoice_item_subtotal		= $prorate;
        $invoice_item_date          = time();

		$invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
	}

	// Create Auto Bill


	$autobill_due_date = mktime(0,0,0,$pices[0]+$contract_to_company_increament,1,$pices[2]);

	$autobill_amount		= $contract_to_company_amount * $contract_to_company_increament;
	$autobill_create_date	= time();
	$autobill_start_date	= $contract_to_company_start_date;
	$autobill_due_date		= $billEndDate;
	$autobill_status		= 'new';


	$autobill_id = $autobillObj->add_autobill($invoice_id,$autobill_amount,$autobill_create_date,$autobill_start_date,$autobill_due_date,$autobill_status);

	// Map Company to autobill
	$company_to_autobill_active = 1;
	$company_to_autobillObj->map_company($autobill_id,$contract_to_company_id,$company_id,$company_to_autobill_active);
	

	// Generate BarCode
	
	


} else {

	require_once(CLASS_PATH."/core/contract_type.class.php");

	$startDate = mktime(0,0,0,date("m"),date("d"),date("Y"));

	$smarty->assign('startDate',$startDate);

	$contract_typeObj = new contract_type();

	$contract_typeObj->view_contract_type($contract_type_id);

	$smarty->assign('contract_typeObj',$contract_typeObj);

	$smarty->display('contract_to_company/contract_options.tpl');

}
?>