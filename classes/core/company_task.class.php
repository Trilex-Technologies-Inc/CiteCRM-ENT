<?php

/**
 * @author Jaimie
 * @copyright 2007
 */
require_once(CLASS_PATH."/getter/company_task_getter.class.php");
class company_task extends company_task_getter {
	
	function company_task() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("company_task");
		
	
		if(!empty($translate_array)) {		
			foreach($translate_array as $translate){				
				$trans = "translate_".strtolower($translate['name']);				
				$val = $translate['content'];								
				$smarty->assign($trans,$val);
				$this->translate[strtolower($translate['name'])] = $val;
				
				
			}
		}
		
		

	}
	
	function new_task($company_id,$company_task_name,$company_task_create,$company_task_due,$company_task_alarm,$company_task_priority,$company_task_category_id,$company_task_text,$company_task_status,$company_task_create_by){
		global $db;
		global $error;
		
		$q = "INSERT INTO company_task SET
				company_id					= " . $db->qstr($company_id) . ",
				company_task_name			= " . $db->qstr($company_task_name) . ",
				company_task_create			= " . $db->qstr($company_task_create) . ",
				company_task_due			= " . $db->qstr($company_task_due) . ",
				company_task_alarm			= " . $db->qstr($company_task_alarm) . ",
				company_task_priority		= " . $db->qstr($company_task_priority) . ",
				company_task_category_id	= " . $db->qstr($company_task_category_id) . ",
				company_task_text			= " . $db->qstr($company_task_text) . ",
				company_task_status			= " . $db->qstr($company_task_status) . ",
				company_task_create_by		= " . $db->qstr($company_task_create_by);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		return $db->Insert_ID();		
				
				
	}
	
	function load_company_task($task_id) {
		global $db;
		global $error;
		
		$q = "SELECT * FROM company_task WHERE company_task_id = " . $db->qstr($task_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];
		
		
	}
	
	
	function load_by_company($company_id,$and,$field,$sort,$start=0,$limit=5,&$total){
		global $db;
		global $error;
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM company_task 
				WHERE company_id = " . $db->qstr($company_id) ."
				$and
				ORDER BY $field $sort LIMIT $start, $limit";
		
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$taskArray = array();
	
		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$taskArray[$counter] = new company_task();
			$taskArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		$q = "SELECT FOUND_ROWS()";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$total = $rs->fields['FOUND_ROWS()'];
	
	
		return $taskArray;
		
	}
	
	
	function load_company_task_category(){
		global $db;
		global $error;
		
		$q = "SELECT * FROM company_task_category";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$taskArray = array();
	
		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$taskArray[$counter] = new company_task();
			$taskArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		return $taskArray;
				
	}
	
	function add_task_category($company_task_category_name){
		global $db;
		global $error;
		
		$q = "INSERT INTO company_task_category SET
			company_task_category_name = " . $db->qstr($company_task_category_name);
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		return $db->Insert_ID();
		
	}
	
	function load_task_due_today(){
		global $db;
		global $error;
		$startDay = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$endDay	= mktime(23,59,59,date("m"),date("d"),date("Y"));
		
		
		$q = "SELECT company_task_name,company_task_due,company_task_alarm,company_task_id 
				FROM company_task 
				WHERE company_task_create_by = " . $db->qstr($_SESSION['SESSION_USER_ID']) ."
				AND company_task_due >= " . $db->qstr($startDay) . "
				AND company_task_due <= " . $db->qstr($endDay);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$taskArray = array();
	
		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$taskArray[$counter] = new company_task();
			$taskArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		return $taskArray;
								
	}
	
	function update_task($company_task_id,$company_id,$company_task_name,$company_task_create,$company_task_due,$company_task_alarm,$company_task_priority,$company_task_category,$company_task_text,$company_task_status,$company_task_create_by) {
		global $db;
		global $error;
		
		$q = "UPDATE company_task SET 
				company_id					= " . $db->qstr($company_id) . ",
				company_task_name			= " . $db->qstr($company_task_name) . ",
				company_task_create			= " . $db->qstr($company_task_create) . ",
				company_task_due			= " . $db->qstr($company_task_due) . ",
				company_task_alarm			= " . $db->qstr($company_task_alarm) . ",
				company_task_priority		= " . $db->qstr($company_task_priority) . ",
				company_task_category_id	= " . $db->qstr($company_task_category_id) . ",
				company_task_text			= " . $db->qstr($company_task_text) . ",
				company_task_status			= " . $db->qstr($company_task_status) . ",
				company_task_create_by		= " . $db->qstr($company_task_create_by) . "
				WHERE company_task_id = " . $db->qstr($company_task_id);

				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
	}
	
	
	
	
}

?>