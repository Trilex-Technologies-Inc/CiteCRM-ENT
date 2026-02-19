<?php
require_once(CLASS_PATH."/getter/lead_getter.class.php");

class lead extends lead_getter {

	function add_lead($lead_assigned_user,$company_id,$lead_referer,$lead_campaign,$lead_type_id,$lead_status_id,$lead_description) {
		global $db;
		global $error;

		$q = "INSERT INTO lead SET
				lead_assigned_user	= " . $db->qstr($lead_assigned_user) . ",
				company_id			= " . $db->qstr($company_id) . ",
				lead_referer		= " . $db->qstr($lead_referer) . ",
				lead_campaign		= " . $db->qstr($lead_campaign) . ",
				lead_type_id		= " . $db->qstr($lead_type_id) . ",
				lead_status_id		= " . $db->qstr($lead_status_id) . ",
				lead_create_date	= " . $db->qstr(time()) .",
				lead_description	= " . $db->qstr($lead_description);


		if( !$rs = $db->Execute($q) ) {
				$error->dbError( $db->ErrorMsg(), $q );
				exit;
		}
	
		return $db->Insert_ID();

	}

	function update_lead($lead_id,$lead_type_id,$lead_status_id,$lead_assigned_user,$lead_referer,$lead_campaign) {
		global $db;
		global $error;
		$q = "UPDATE lead SET
			lead_type_id			= " . $db->qstr($lead_type_id) . ",
			lead_status_id			= " . $db->qstr($lead_status_id) . ",
			lead_assigned_user		= " . $db->qstr($lead_assigned_user) . ",
			lead_referer			= " . $db->qstr($lead_referer) . ",
			lead_campaign			= " . $db->qstr($lead_campaign) . "
		WHERE lead_id = " . $db->qstr($lead_id);

		if( !$rs = $db->Execute($q) ) {
				$error->dbError( $db->ErrorMsg(), $q );
				exit;
		}
	}


	function search_leads($field,$sort,$and,$start=0,$limit=15,&$total){
		global $db;
		global $error;

		//And 


		$q="SELECT SQL_CALC_FOUND_ROWS * 
			FROM lead
			WHERE 1
			$and
			ORDER BY $field $sort LIMIT $start, $limit";




		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$leadArray = array();		
		$counter = 0;
		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {
			$leadArray[$counter] = new lead();			
			$leadArray[$counter]->fields = $tempArray[$counter];			
			$counter++;
		}
        

        
		// now we get the total number of records from the table
		$q = "SELECT FOUND_ROWS()";
        
      	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
        
		$total = $rs->fields['FOUND_ROWS()'];

		return $leadArray;
	}

	function load_by_user($user_id,$field,$sort,$start=0,$limit=15,&$total) {
		global $db;
		global $error;
		
		$q="SELECT SQL_CALC_FOUND_ROWS * 
			FROM lead
			WHERE lead_assigned_user = " . $db->qstr($user_id) . "
			ORDER BY $field $sort LIMIT $start, $limit";
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$leadArray = array();		
		$counter = 0;
		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {
			$leadArray[$counter] = new lead();			
			$leadArray[$counter]->fields = $tempArray[$counter];			
			$counter++;
		}
        

        
		// now we get the total number of records from the table
		$q = "SELECT FOUND_ROWS()";
        
      	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
        
		$total = $rs->fields['FOUND_ROWS()'];

		return $leadArray;
	}


	function load_by_id($lead_id) {
		global $db;
		global $error;

		$q = "SELECT * FROM lead WHERE lead_id = " . $db->qstr($lead_id);


		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];

		
	}

	function convert($company_id,$company_type){
		global $db;
		global $error;

		$q = "UPDATE company SET
				company_active			= '1',
				company_type			= " . $db->qstr($company_type) . "
			WHERE company_id 			= " . $db->qstr($company_id);



		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

	}

	function convert_lead($lead_id) {
		global $db;
		global $error;

		$q = "UPDATE lead SET lead_status_id = '4' WHERE lead_id = " . $db->qstr($lead_id);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

	}


	function load_lead_email_address($lead_id){
		global $db;
		global $error;
		
		$q = "SELECT company_id FROM lead WHERE lead_id = " . $db->qstr($lead_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		$company_id = $rs->fields['company_id'];
				
		
		$q = "SELECT company_contact_value,company_contact_type FROM company_contact WHERE company_id = " . $db->qstr($company_id) . " ORDER BY company_contact_id";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$emailArray = array();
		$counter = 0;
		
		while(!$rs->EOF){
			if($rs->fields['company_contact_type'] == 'Email'){
				$emailArray[$counter]['email_address'] = $rs->fields['company_contact_value'];
			}
			if($rs->fields['company_contact_type'] == 'Contact Name'){
				$emailArray[$counter]['email_name'] = $rs->fields['company_contact_value'];
			}
			
			$counter = 0;
			$rs->MoveNext();
		}
		
		return $emailArray;
		
		
	}

	function load_open_leads($lead_campaign) {
	global $db;
	global $error;
	
	$q = "SELECT * FROM lead 
			WHERE lead_campaign = " . $db->qstr($lead_campaign);
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
		$campaignArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$campaignArray[$counter] = new lead();
		$campaignArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $campaignArray;

	}
	
	function load_converted($lead_campaign){
		global $db;
	global $error;
	
	$q = "SELECT * FROM lead 
			WHERE lead_campaign = " . $db->qstr($lead_campaign) . "
			AND lead_status_id = '4'
			";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
		$campaignArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$campaignArray[$counter] = new lead();
		$campaignArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $campaignArray;
		
	}
}

?>