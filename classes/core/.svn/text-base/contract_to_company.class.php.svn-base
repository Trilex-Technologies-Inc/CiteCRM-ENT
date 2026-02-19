<?php

/**
 * Type:     Cite CMS Core Class<br>
 * Name:     contract_to_company.class.php<br>
 * Purpose:  For all campaign_type methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/
require_once(CLASS_PATH."/getter/contract_to_company_getter.class.php");

class contract_to_company extends contract_to_company_getter {


	function add_company_contract($contract_type_id,$company_id,$contract_to_company_active,$contract_to_company_start_date,$contract_to_company_term,$contract_to_company_increament,$contract_to_company_amount,$contract_to_company_covered_labor,$contract_to_company_covered_labor_rate,$contract_to_company_non_covered_labor_rate,$contract_to_company_call_min,$contract_to_company_call_covered_rate,$contract_to_company_call_non_covered_rate) {
		global $db;
		global $error;

		$q = "INSERT INTO contract_to_company SET 
				contract_type_id					        = " . $db->qstr($contract_type_id) . ",
				company_id							        = " . $db->qstr($company_id) . ",
				contract_to_company_active			        = " . $db->qstr($contract_to_company_active) . ",
				contract_to_company_start_date		        = " . $db->qstr($contract_to_company_start_date) . ",
				contract_to_company_term			        = " . $db->qstr($contract_to_company_term) . ",
				contract_to_company_increament		        = " . $db->qstr($contract_to_company_increament) . ",
				contract_to_company_amount			        = " . $db->qstr($contract_to_company_amount) . ",
				contract_to_company_covered_labor           = " . $db->qstr($contract_to_company_covered_labor) . ",
                contract_to_company_covered_labor_rate      = " . $db->qstr($contract_to_company_covered_labor_rate) . ",
                contract_to_company_non_covered_labor_rate  = " . $db->qstr($contract_to_company_non_covered_labor_rate) . ",
                contract_to_company_call_min                = " . $db->qstr($contract_to_company_call_min) . ",
                contract_to_company_call_covered_rate       = " . $db->qstr($contract_to_company_call_covered_rate) . ",
                contract_to_company_call_non_covered_rate   = " . $db->qstr($contract_to_company_call_non_covered_rate);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$id = $db->Insert_ID();

		$q = "UPDATE company SET company_type = 'Contract' WHERE company_id=" . $db->qstr($company_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}


		return $id;

	}



	function load_active_by_company($company_id) {
		global $db;
		global $error;
	
		$q = "SELECT contract_to_company.*, contract_type.contract_type_name FROM contract_to_company
				LEFT JOIN contract_type ON contract_to_company.contract_type_id = contract_type.contract_type_id
				WHERE company_id = " . $db->qstr($company_id) . "
				AND contract_to_company_active = '1'";

		if(!$rs = $db->Execute($q)) {
			print $db->ErrorMsg();
			die;
		//	$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];


	}

	function load_labor_hour_by_month($company_id,$start_date,$end_date) {
        global $db;
		global $error;

       

        $q = "SELECT  SUM(workorder_time.workorder_time_total) as total_time 
                FROM company_to_workorder 
                LEFT JOIN workorder_time ON company_to_workorder.workorder_id = workorder_time.workorder_id
                WHERE company_to_workorder.company_id = " . $db->qstr($company_id) . "
                AND workorder_time.workorder_time_start >= " .$db->qstr($start_date) . "
                AND workorder_time.workorder_time_end <= " .$db->qstr($end_date) . "
                GROUP BY company_to_workorder.workorder_id";

     


    
        $rs = $db->Execute($q);
        if($rs){
            while (!$rs->EOF) {	
                $total_time =  $total_time + $rs->fields['total_time'];
                $rs->MoveNext();
            } 
       }


        return $total_time;
    
    }

    function load_contract_hours_for_credit($company_id,$start_date,$end_date) {
        global $db;
		global $error;

        $q = "SELECT SUM(invoice_item_qty) AS total_time FROM invoice_item
                WHERE account_type = 'company_id'
                AND account_type_id = " . $db->qstr($company_id) . "
                AND invoice_item_type = 'Contract Labor'
                AND invoice_item_date >= " .$db->qstr($start_date) . "
                AND invoice_item_date <= " .$db->qstr($end_date) . "
                AND invoice_id ='0'";
          

        $rs = $db->Execute($q);
        if($rs){
            while (!$rs->EOF) {	
                $total_time =  $total_time + $rs->fields['total_time'];
                $rs->MoveNext();
            } 
       }


        return $total_time;      
            

    }


    function load_call_min_by_month($company_id) {
        global $db;
		global $error;

        $start_date = mktime(0,0,0,date("m"),1,date("Y"));
        $end_date = mktime(0,0,0,date("m"),date("t"),date("Y"));


        $q = "SELECT SUM(support_call_num_min) as total_time 
                FROM support_calls 
                WHERE support_call_type = 'company_id'
				AND support_calls_billing_rate > 0 
                AND support_call_type_id = " .  $db->qstr($company_id) . "
                AND support_call_start >= " .$db->qstr($start_date) . "
                AND support_call_stop <= " .$db->qstr($end_date);

        $rs = $db->Execute($q);
        if($rs){
            while (!$rs->EOF) {	
                $total_time =  $total_time + $rs->fields['total_time'];
                $rs->MoveNext();
            } 
       }

    
        return $total_time;

    }

    function load_all_active() {
        global $db;
		global $error;

        $q = "SELECT * FROM contract_to_company WHERE contract_to_company_active = '1'";
        if(!$rs = $db->Execute($q)) {
			print $db->ErrorMsg();
			die;
		}
        
        $contractArray = array();

        $counter = 0;
    
        $tempArray = $rs->GetArray();
    
        while($counter < count($tempArray)) {
            $contractArray[$counter] = new contract_to_company();
            $contractArray[$counter]->fields = $tempArray[$counter];
            $counter++;
        }

        return $contractArray;

    }

}

?>