<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_add_workorder_time.php<br>
 * Purpose:  View workorder Time<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_CREATE);

if(isset($_REQUEST['submit'])) {

		require_once(CLASS_PATH ."/core/workorder_time.class.php");
        require_once(CLASS_PATH."/core/workorder.class.php");

        

		$workorderTimeObj = new workorder_time();

       

 
		$startDateMonth 	= $_REQUEST['startDateMonth']; 
		$startDateDay		= $_REQUEST['startDateDay']; 
		$startDateYear		= $_REQUEST['startDateYear']; 
		$startTimeHour		= $_REQUEST['startTimeHour']; 
		$startTimeMinute	= $_REQUEST['startTimeMinute']; 
		$endTimeHour		= $_REQUEST['endTimeHour']; 
		$endTimeMinute		= $_REQUEST['endTimeMinute']; 
		$workorder_id		= $_REQUEST['workorder_id']; 
		$user_id			= $_SESSION['SESSION_USER_ID']; 
        $workorder_time_rate = $_POST['workorder_time_rate'];
        $workorder_time_description = $core->prepare_post($_POST['workorder_time_description']);
		
					
		$workorder_time_start = mktime($startTimeHour,$startTimeMinute,0,$startDateMonth,$startDateDay,$startDateYear);	
		//print date("Y-m-d H:i:s", $workorder_time_start);
		
		// Create End Date		
		$workorder_time_end =  mktime($startTimeHour + $endTimeHour,$startTimeMinute + $endTimeMinute,0,$startDateMonth,$startDateDay,$startDateYear);
		//print date("Y-m-d H:i:s", $workorder_time_end);
		
		// Total Time		
		$min = $endTimeMinute / 60;
		
		$workorder_time_total = $endTimeHour  + $min;
        $workorder_time_amount = $workorder_time_total * $workorder_time_rate;
	
        $workorderObj = new workorder();

        $workorderObj->view_workorder($workorder_id);

        $workorderObj->load_company_by_workorder($workorder_id);

         if($workorderObj->fields['company_id'] > 0 ) {

            require_once(CLASS_PATH."/core/contract_to_company.class.php");
            $contractObj = new contract_to_company();
            $company_id = $workorderObj->fields['company_id'];
            $contractObj->load_active_by_company($company_id);
    
            // If we have a contract
            if($contractObj->get_contract_type_id() > 0) {
    
                $max_num_hours = $contractObj->fields['contract_to_company_covered_labor'];
                $contract_rate = $contractObj->fields['contract_to_company_covered_labor_rate'];
                $non_contract_rate = $contractObj->fields['contract_to_company_non_covered_labor_rate'];
    
                // Load total Hours
                $start_date = mktime(0,0,0,date("m"),1,date("Y"));
                $end_date = mktime(0,0,0,date("m"),date("t"),date("Y"));
                $total_hours = $contractObj->load_labor_hour_by_month($company_id,$start_date,$end_date);

                $new_total_hours = $workorder_time_total + $total_hours;

               

                if($new_total_hours > $max_num_hours) {
        
                    if($total_hours > $max_num_hours) {
        
                        $new_workorder_time_description =  $workorder_time_description . " Non Contract Labor";  
        
                        $workorder_time_labor_type = 'Labor';

                        $workorder_time_rate = $non_contract_rate;
        
                        $workorder_time_amount = $workorder_time_rate * $workorder_time_total;
        
                        $workorderTimeObj->add_workorder_time($workorder_id,$user_id,$workorder_time_start,$workorder_time_end,$workorder_time_total,$workorder_time_rate,$workorder_time_labor_type,$workorder_time_amount,$new_workorder_time_description);
                
                    } else {
                        print "Total Time " . $new_total_hours . "<br>";
            
                        // Bill non contract
                        $non_contract_hours = $new_total_hours - $max_num_hours; 
                    
                        $contract_hours = $workorder_time_total - $non_contract_hours;
            
                        $non_contract_total = $non_contract_rate * $non_contract_hours;
                        
                        $minus_min = $non_contract_hours * 60; 
                
                        $contract_end_time = mktime( date("H",$workorder_time_end) ,date("i",$workorder_time_end)- $minus_min,0,date("m",$workorder_time_end),date("d",$workorder_time_end),date("Y",$workorder_time_end));
                    
                        $contract_total = $contract_hours * $contract_rate;
            
                        print "Contract Hours " . $contract_hours . " * " .$contract_rate."<br>";
                        print "Contract Amount " .  $contract_total . "<br>";
                        print "Start " . date("H:i m-dY",$workorder_time_start) . " to " . date("H:i m-dY",$contract_end_time);
                        
                        $new_workorder_time_description =  $workorder_time_description . " Contract Labor";            
            
                        $workorder_time_labor_type = "Contract Labor";

                        $workorderTimeObj->add_workorder_time($workorder_id,$user_id,$workorder_time_start,$contract_end_time,$contract_hours,$contract_rate,$workorder_time_labor_type,$contract_total,$new_workorder_time_description);
            
            
                        print "<br><br>";
                        print "Non Contract Hours " . $non_contract_hours . " * " . $non_contract_rate. "<br>";
                        print "Non Contract Amount " . $non_contract_total . "<br>";
                        print "Start " . date("H:i m-dY",$contract_end_time) . " to " . date("H:i m-dY",$workorder_time_end);    
                    
                        $new_workorder_time_description =  $workorder_time_description . " Non Contract Labor";
            
                        $workorder_time_labor_type = "Labor";

                        $workorderTimeObj->add_workorder_time($workorder_id,$user_id,$contract_end_time,$contract_end_time,$non_contract_hours,$non_contract_rate,$workorder_time_labor_type,$non_contract_total,$new_workorder_time_description);
                    
                    }
                } else {
                    

                    $new_workorder_time_description =  $workorder_time_description . " Contract Labor";  

                    $workorder_time_labor_type = "Contract Labor";      

                    $workorderTimeObj->add_workorder_time($workorder_id,$user_id,$workorder_time_start,$workorder_time_end,$workorder_time_total,$workorder_time_rate,$workorder_time_labor_type,$workorder_time_amount,$new_workorder_time_description);
                } 


            } else {
                $workorder_time_labor_type = "Labor";
                $workorderTimeObj->add_workorder_time($workorder_id,$user_id,$workorder_time_start,$workorder_time_end,$workorder_time_total,$workorder_time_rate,$workorder_time_labor_type,$workorder_time_amount,$workorder_time_description);
            }

        } 


        

} else {

    require_once(CLASS_PATH."/core/workorder.class.php");

    $workorderObj = new workorder();

    $workorder_id = $_POST['workorder_id'];

    $workorderObj->view_workorder($workorder_id);


    // Check if we have a contract
    $workorderObj->load_company_by_workorder($workorder_id);
    if($workorderObj->fields['company_id'] > 0 ) {
        require_once(CLASS_PATH."/core/contract_to_company.class.php");
        $contractObj = new contract_to_company();
        $company_id = $workorderObj->fields['company_id'];
        $contractObj->load_active_by_company($company_id);

        // If we have a contract
        if($contractObj->get_contract_type_id() > 0) {

            $max_num_hours = $contractObj->fields['contract_to_company_covered_labor'];
            $contract_rate = $contractObj->fields['contract_to_company_covered_labor_rate'];
            $non_contract_rate = $contractObj->fields['contract_to_company_non_covered_labor_rate'];

            // Load total Hours
            $start_date = mktime(0,0,0,date("m"),1,date("Y"));
            $end_date = mktime(0,0,0,date("m"),date("t"),date("Y"));
            $total_hours = $contractObj->load_labor_hour_by_month($company_id,$start_date,$end_date);

            // If total hours greater than max bill non covered amount
            if($total_hours <= $max_num_hours) {
                $billing_rate = $contract_rate;
                $billing_type = "Contract Rate";
            } else {
                $billing_rate = $non_contract_rate;
                $billing_type = "Non Contract Rate";
            }
            
            $smarty->assign('contract_bill',true);
            $smarty->assign('billing_type',$billing_type);
            $smarty->assign('billing_rate',$billing_rate);
        }

         
        
    }
    

    $start_time = $workorderObj->get_workorder_start_time();

    $smarty->assign('startTime', $start_time);
    

	$smarty->display('workorder/ajax_add_workorder_time.tpl');

}

?>