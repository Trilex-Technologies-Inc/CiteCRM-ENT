<?php
$core->verifyAdmin(CAN_CREATE);

require_once(CLASS_PATH."/core/support_call.class.php");

$support_callObj = new support_call();

if(isset($_POST['submit'])) {
    require_once(CLASS_PATH."/core/invoice.class.php");



    $invoiceObj = new invoice();
	$support_call_type		= $_POST['support_call_type'];
	$support_call_type_id	= $_POST['support_call_type_id'];
	$support_call_notes		= $_POST['support_call_notes'];
	$startMonth 			= $_POST["startMonth"];
	$startDay 				= $_POST["startDay"];
	$startYear 				= $_POST["startYear"];
	$startHour 				= $_POST["startHour"];
	$startMinute 			= $_POST["startMinute"];
	$endMonth 				= $_POST["endMonth"];
	$endDay 				= $_POST["endDay"];
	$endYear 				= $_POST["endYear"];
	$endHour 				= $_POST["endHour"];
	$endMinute 				= $_POST["endMinute"];
	$is_billable			= $_POST["isBillable"];
	$support_call_enter_by	= $_SESSION['SESSION_USER_ID'];
	

    $start = mktime($startHour,$startMinute,0,$startMonth,$startDay,$startYear);

    $end = mktime($endHour,$endMinute,0,$endMonth,$endDay,$endYear);

    $call_minnutes = $end - $start;


    if($call_minnutes > 60) {
        $call_minnutes = $call_minnutes / 60;
        $call_minnutes = $core->n_round($call_minnutes, 2);
    } else {
        $call_minnutes = 1;
    }




  // If Billable
	if($is_billable){

				// Check if they have Contract do othing else create an invoice for the Time
			    if($support_call_type == 'company_id') {
			
			        require_once(CLASS_PATH."/core/contract_to_company.class.php");
			
			        $company_id = $support_call_type_id;
			
			        $contract_to_companyObj = new contract_to_company();
			
			        $contract_to_companyObj->load_active_by_company($company_id);
			    
			        $contract_max_min = $contract_to_companyObj->get_contract_to_company_call_min();
			
			        $contract_rate = $contract_to_companyObj->get_contract_to_company_call_covered_rate();
			
			        $non_contract_rate = $contract_to_companyObj->get_contract_to_company_call_non_covered_rate();
			
			        $total_time = $contract_to_companyObj->load_call_min_by_month($company_id);
			

			
			
			         $invoice_id                 = 0;
			         $account_type               = 'company_id';
			         $account_type_id            = $company_id;
			         $invoice_item_type_id       = $support_call_id;
			         $invoice_item_line_type     = 'Debit';
			         $invoice_item_description   = "Tech Support Call. ";
			         $invoice_item_date          = time();
			
			        // If we have a contract
			        if(!empty($contract_max_min)) {
			
			
			            if($total_time > $contract_max_min) {
			
			                $invoice_item_amount        = $non_contract_rate;
			                $invoice_item_subtotal      = $call_minnutes * $non_contract_rate;
			                $invoice_item_qty           = $call_minnutes;
			                $invoice_item_description   = $invoice_item_description . " Non Contract Covered Minutes";
			                $invoice_item_type          = 'Support Call';
			                $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
			
			            } else {
			                // Covered By Contract
			    
			                if($total_time + $call_minnutes > $contract_max_min) {
			                    // New min put us over the limit
			                    $total_min    = $total_time + $call_minnutes;
			                    $over_min     = $total_min - $contract_max_min;
			                    $contract_min = $call_minnutes - $over_min;
			
			                    // Record Contract Mins
			                    $invoice_item_amount       = $contract_rate;
			                    $invoice_item_subtotal     = $contract_min * $contract_rate;
			                    $invoice_item_qty          = $contract_min;
			                    $invoice_item_description  = $invoice_item_description . " Contract Covered Minutes";
			                    $invoice_item_type         = "Contract Support Call";
			
			                    $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
			
			                    // Record Non Contract Min
			                    $invoice_item_amount       = $non_contract_rate;
			                    $invoice_item_subtotal     = $over_min * $non_contract_rate;
			                    $invoice_item_qty          = $over_min;
			                    $invoice_item_description  = $invoice_item_description . " Non Contract Covered Minutes";
			                    $invoice_item_type         = 'Support Call';
			
			                    $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
			
			                } else {
			
			                    $invoice_item_amount        = $contract_rate;
			                    $invoice_item_subtotal      = $call_minnutes * $contract_rate;
			                    $invoice_item_qty           = $call_minnutes;
			                    $invoice_item_description   = $invoice_item_description . " Contract Covered Minutes";
			                    $invoice_item_type          = "Contract Support Call";
			
			                    $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);
			                }
			            }
			
			            
			       
			        } else {
			            // Default price per minutte
			
			            $invoice_item_amount        = DEFAULT_CALL_COST;                    
			            $invoice_item_qty           = $call_minnutes;
			            $invoice_item_subtotal      = DEFAULT_CALL_COST * $call_minnutes;  
			            $invoice_item_description   = $invoice_item_description . " Non Contract Covered Minutes";
			            $invoice_item_type          = 'Support Call';
			            $invoiceObj->add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal);  
			        }

				} else {
					// User Call
				}

       
        
    
    } else {
       	echo "Not billable";
		$invoice_item_amount = 0;
    }

	$support_callObj->save_call($call_minnutes,$support_call_type,$support_call_type_id,$support_call_enter_by,$start,$end,$invoice_item_amount,$support_call_notes);
		

} else {

	$support_call_id = $_REQUEST['support_call_id'];

	$smarty->assign('support_call_id',$support_call_id);
	
	$smarty->display('support_call/ajax_end_support_call.tpl');

}



?>