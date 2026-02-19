<?php
require_once(CLASS_PATH."/getter/support_call_getter.class.php");

class support_call extends support_call_getter {


    function load_support_call_by_id($support_call_id) {
        global $db;
		global $error;

        $q = "SELECT * FROM  support_calls WHERE support_call_id = " . $db->qstr($support_call_id);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

        $tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];


    }

	function start_call($support_call_type,$support_call_type_id,$support_call_enter_by,$support_call_start) {
		global $db;
		global $error;

		$q="INSERT INTO support_calls SET 
				support_call_type		= " . $db->qstr($support_call_type) . ",
				support_call_type_id	= " . $db->qstr($support_call_type_id) . ",
				support_call_enter_by	= " . $db->qstr($support_call_enter_by) . ",
				support_call_start		= " . $db->qstr($support_call_start);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		return $db->Insert_Id();
	}

	function stop_call($support_call_stop,$support_call_notes,$support_call_id,$support_call_num_min) {
		global $db;
		global $error;

		$q = "UPDATE support_calls SET
			  support_call_stop   	= " . $db->qstr($support_call_stop) . ",
		      support_call_notes	= " . $db->qstr($support_call_notes) . ",
              support_call_num_min  = " . $db->qstr($support_call_num_min) . "
			WHERE support_call_id 		= " . $db->qstr($support_call_id);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

        
	}
	
	function save_call($support_call_num_min,$support_call_type,$support_call_type_id,$support_call_enter_by,$support_call_start,$support_call_stop,$support_calls_billing_rate,$support_call_notes){
		global $db;
		global $error;
		
		$q = "INSERT INTO support_calls SET
				support_call_num_min		= " . $db->qstr($support_call_num_min) . ",
				support_call_type			= " . $db->qstr($support_call_type) . ",
				support_call_type_id		= " . $db->qstr($support_call_type_id) . ",
				support_call_enter_by		= " . $db->qstr($support_call_enter_by) . ",
				support_call_start			= " . $db->qstr($support_call_start) . ",
				support_call_stop			= " . $db->qstr($support_call_stop) . ",
				support_calls_billing_rate	= " . $db->qstr($support_calls_billing_rate) . ",
				support_call_notes			= " . $db->qstr($support_call_notes);
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		return $db->Insert_Id();
	}


	function load_by_type($support_call_type,$support_call_type_id,$field,$sort,$start,$limit,&$total){
		global $db;
		global $error;

		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM support_calls WHERE
				support_call_type = " . $db->qstr($support_call_type) . "
				AND support_call_type_id = " . $db->qstr($support_call_type_id) ."
				ORDER BY $field $sort";

		if($limit > 0) {
			$q .= " LIMIT $start,$limit";
		}

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}


		$callArray = array();		
		$counter = 0;
		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {
			$callArray[$counter] = new support_call();			
			$callArray[$counter]->fields = $tempArray[$counter];			
			$counter++;
		}
        
		$q = "SELECT FOUND_ROWS()";
        
      	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
        
		$total = $rs->fields['FOUND_ROWS()'];
		
		return $callArray;	
	}

    function load_by_empoloyee($employee_id,$field,$sort,$start,$limit,&$total){
        global $db;
        global $error;

        $q = "SELECT SQL_CALC_FOUND_ROWS support_calls.*, company.*
                FROM support_calls 
                LEFT JOIN company ON support_calls.support_call_type_id = company.company_id
                WHERE support_call_enter_by = " . $db->qstr($employee_id) . "
                
                ORDER BY $field $sort";

        if($limit > 0) {
            $q .= " LIMIT $start,$limit";
        }

        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }


        $callArray = array();       
        $counter = 0;
        $tempArray = $rs->GetArray();
        
        
        while($counter < count($tempArray)) {
            $callArray[$counter] = new support_call();          
            $callArray[$counter]->fields = $tempArray[$counter];            
            $counter++;
        }
        
        $q = "SELECT FOUND_ROWS()";
        
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
        
        $total = $rs->fields['FOUND_ROWS()'];
        
        return $callArray;  
    }




	function load_running_call_by_login($session_user_id){
		global $db;
		global $error;

		$startTime = mktime(0,0,0,date("m"),date("d"),date("Y"));

		$q = "SELECT support_call_id,support_call_type,support_call_enter_by,support_call_start,support_call_stop
			FROM support_calls
			WHERE support_call_stop < 1
			AND support_call_enter_by = " . $db->qstr($session_user_id);

		if(!$rs = $db->Execute($q)) {
			print $db->ErrorMsg();
			die;
		}


		$tempArray = $rs->GetArray();
		if(!empty($tempArray)){
			$this->fields = $tempArray[0];
		}

	}


}
?>