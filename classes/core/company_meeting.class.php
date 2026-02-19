<?php
require(CLASS_PATH.'/getter/company_meeting_getter.class.php');

class company_meeting extends company_meeting_getter {


    function company_meeting() {
        global $smarty;
        global $translate;
        $translate = new translate();
        $translate_array = $translate->translate_module("company_meeting");
        if(!empty($translate_array)) {
            foreach($translate_array as $translate){
                $tans = "translate_".strtolower($translate['name']);
                $val = $translate['content'];
                $smarty->assign($tans,$val);
            }
        }
    }


    function load_by_company($company_id,$field,$sort,$start,$limit,&$total){
        global $db;
        global $error;


        $q = " SELECT SQL_CALC_FOUND_ROWS * FROM company_meeting 
                WHERE 1 = 1
                AND company_id = " . $db->qstr($company_id) . "
                ORDER BY $field $sort
                LIMIT $start , $limit";

        if(!$rs = $db->Execute($q)) {
           $error->dbError($db->ErrorMsg(), $q);
        }
        
        $meetingArray = array();

        $counter = 0;
    
        $tempArray = $rs->GetArray();
    
        while($counter < count($tempArray)) {
            $meetingArray[$counter] = new company_meeting();
            $meetingArray[$counter]->fields = $tempArray[$counter];
            $counter++;
        }
    
    
        $q = "SELECT FOUND_ROWS()";
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
        $total = $rs->fields['FOUND_ROWS()'];
    
        return $meetingArray;
        

    }


	function add_company_meeting($company_id,$company_meeting_subject,$company_meeting_text,$company_meeting_start,$company_meeting_end,$company_meeting_active){
		global $db;
        global $error;
        
        $q = "INSERT INTO company_meeting SET
				company_id					= " . $db->qstr($company_id) . ",
				company_meeting_start		= " . $db->qstr($company_meeting_start) . ",
				company_meeting_end			= " . $db->qstr($company_meeting_end) . ",
				company_meeting_subject		= " . $db->qstr($company_meeting_subject) . ",
				company_meeting_text		= " . $db->qstr($company_meeting_text) . ",
				company_meeting_created_by	= " . $db->qstr($company_meeting_active) . ",
				company_meeting_active		= " . $db->qstr($company_meeting_active);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

 		return $db->Insert_ID();		
	}
	
	function view_meeting($company_meeting_id){
		global $db;
        global $error;
        
        $q = "SELECT * FROM company_meeting  WHERE company_meeting_id = " . $db->qstr($company_meeting_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];
		
	}
	
	function edit_company_meeting($company_meeting_id,$company_id,$company_meeting_subject,$company_meeting_text,$company_meeting_start,$company_meeting_end,$company_meeting_active){
		global $db;
        global $error;
		
		$q = "UPDATE company_meeting SET
				company_id					= " . $db->qstr($company_id) . ",
				company_meeting_start		= " . $db->qstr($company_meeting_start) . ",
				company_meeting_end			= " . $db->qstr($company_meeting_end) . ",
				company_meeting_subject		= " . $db->qstr($company_meeting_subject) . ",
				company_meeting_text		= " . $db->qstr($company_meeting_text) . ",
				company_meeting_created_by	= " . $db->qstr($company_meeting_active) . ",
				company_meeting_active		= " . $db->qstr($company_meeting_active) . "
				WHERE company_meeting_id	= " . $db->qstr($company_meeting_id);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}	
		
	}

}
?>