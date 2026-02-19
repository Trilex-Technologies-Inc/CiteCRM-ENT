<?php


require(CLASS_PATH.'/getter/alert_getter.class.php');

class alert extends alert_getter {



    function save_new_alert($alert_start_date,$alert_end_date,$alert_subject,$alert_text,$alert_active) {
        global $db;
        global $error;

        $q = "INSERT INTO alert SET
        		alert_create_by	 = " . $db->qstr($_SESSION['SESSION_USER_ID']) . ",
                alert_start_date = " . $db->qstr($alert_start_date) . ",
                alert_end_date   = " . $db->qstr($alert_end_date) . ",
                alert_subject    = " . $db->qstr($alert_subject) . ",
                alert_text       = " . $db->qstr($alert_text) . ",
                alert_active     = " . $db->qstr($alert_active);

        if( !$rs = $db->Execute($q) ) {
				$error->dbError( $db->ErrorMsg(), $q );
				exit;
		}
	
		return $db->Insert_ID();			


    }

    
    function map_alert_to_user($alert_id,$user_id,$alert_to_employee_read,$alert_to_employee_read_date) {
        global $db;
        global $error;
        
        $q = "INSERT INTO alert_to_employee SET 
                alert_id                    = " . $db->qstr($alert_id) . ",
                user_id                     = " . $db->qstr($user_id) . ",
                alert_to_employee_read      = " . $db->qstr($alert_to_employee_read) . ",
                alert_to_employee_read_date = " . $db->qstr($alert_to_employee_read_date);

        if( !$rs = $db->Execute($q) ) {
				$error->dbError( $db->ErrorMsg(), $q );
				exit;
		}
	
		return $db->Insert_ID();	
 
    }
    
    
    function load_by_user($user_id,$field='alert.alert_id',$sort='ASC',$start=0,$limit=25,&$total) {
    	global $db;
    	global $error;
    	
    	$q = "SELECT alert_to_employee.*, alert.*  
    		FROM alert_to_employee 
    		LEFT JOIN alert ON alert_to_employee.alert_id = alert.alert_id
    		WHERE alert_to_employee.user_id = " . $db->qstr($user_id) . "  				
    		ORDER BY $field $sort LIMIT $start ,$limit";	

    		
    	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
    	
    	
    	$alertArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();
		
		while($counter < count($tempArray)) {
			$alertArray[$counter] = new alert();
			$alertArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
		
		
		$q = "SELECT FOUND_ROWS()";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$total = $rs->fields['FOUND_ROWS()'];
	
		return $alertArray;
    	
    }


	function load_unread_by_user($user_id) {
		global $db;
		global $error;
		
		$q = "SELECT alert_to_employee.*, alert.*  
    		FROM alert_to_employee 
    		LEFT JOIN alert ON alert_to_employee.alert_id = alert.alert_id
    		WHERE alert_to_employee.user_id = " . $db->qstr($user_id) . "
    		AND alert_to_employee.alert_to_employee_read = '0'
    		AND alert.alert_end_date > " . $db->qstr(time()) . "
    	    ORDER BY alert.alert_start_date ASC LIMIT 0,1";
    	    
    	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}	 
		
		$tempArray = $rs->GetArray();
		
		
		@$this->fields = $tempArray[0];
		
	
	}
	
	function load_alert_by_id($alert_id,$user_id) {
		global $db;
		global $error;
		
		$q = "SELECT alert_to_employee.*, alert.*  
    		FROM alert_to_employee 
    		LEFT JOIN alert ON alert_to_employee.alert_id = alert.alert_id
    		WHERE alert_to_employee.user_id = " . $db->qstr($user_id) . "
    		AND alert_to_employee.alert_id = " . $db->qstr($alert_id);
    		
    	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}	 
		
		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];
		
	}
	
	function mark_read($user_id,$alert_id) {
		global $db;
		global $error;
		
		$q = "UPDATE alert_to_employee SET alert_to_employee_read='1', alert_to_employee_read_date = " . $db->qstr(time()) . " WHERE alert_id = " . $db->qstr($alert_id) . " AND user_id = " . $db->qstr($user_id);
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
	}

	function load_employees_by_alert($alert_id) {
		global $db;
		global $error;
		
		$q = "SELECT * FROM alert_to_employee WHERE alert_id = " . $db->qstr($alert_id);
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$empArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();
		
		while($counter < count($tempArray)) {
			$empArray[$counter] = new alert();
			$empArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
		
		return $empArray;
		
	}

}

?>