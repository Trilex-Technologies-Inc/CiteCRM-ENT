<?php

/**
 * @author 
 * @copyright 2007
 */

require(CLASS_PATH.'/getter/workorder_service_getter.class.php');

class workorder_service extends workorder_service_getter {
	
	
	
	function load_by_workorder($workorder_id,$field='workorder_service_id',$sort='ASC',$start=0,$limit=5,&$total){
		global $db;
		global $error;
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM workorder_service
				WHERE workorder_id = ". $db->qstr($workorder_id) . "
				ORDER BY $field $sort";
	
		if($limit > 0) {
		 	$q .=" LIMIT $start,$limit";
		}
	
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}		
		
		
		$workorder_serviceArray = array();
	
		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$workorder_serviceArray[$counter] = new workorder_service();
			$workorder_serviceArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
	
		$q = "SELECT FOUND_ROWS()";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$total = $rs->fields['FOUND_ROWS()'];
	
		return $workorder_serviceArray;
	
	}	
	
	
	function add_workorder_service($workorder_id,$workorder_service_qty,$workorder_service_description,$workorder_service_amount,$workorder_service_total) {
		global $db;
		global $error;
		
		$q = "INSERT INTO workorder_service SET
				workorder_id					= " . $db->qstr($workorder_id) . ",
				workorder_service_qty			= " . $db->qstr($workorder_service_qty) . ",
				workorder_service_description	= " . $db->qstr($workorder_service_description) . ",
				workorder_service_amount		= " . $db->qstr($workorder_service_amount) . ",
				workorder_service_total			= " . $db->qstr($workorder_service_total);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
	}
	
}

?>