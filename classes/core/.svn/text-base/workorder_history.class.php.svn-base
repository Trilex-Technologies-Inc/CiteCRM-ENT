<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     workorder_history.class.php<br>
 * Purpose:  For all workorder_history methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require_once(CLASS_PATH.'/getter/workorder_history_getter.class.php');

class workorder_history extends workorder_history_getter {

function add_workorder_history($this){
	global $db;
	global $error;

	$q = "INSERT INTO  workorder_history SET
			workorder_id							=". $db->qstr($this->fields['workorder_id']) .",
			user_id									=". $db->qstr($this->fields['user_id']) .",
			workorder_history_text				=". $db->qstr($this->fields['workorder_history_text']) .",
			workorder_history_create_date	=". $db->qstr($this->fields['workorder_history_create_date']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_workorder_history<br>
* Purpose:  Loads A single workorder_history row<br>
*
* @author Cite CMS Module Developer
* @param $workorder_history_id String The workorder_history ID
* @access Public
* @return workorder_history Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_workorder_history($workorder_history_id){
	global $db;
	global $error;

	$q = "SELECT * FROM workorder_history
	WHERE workorder_history_id = ". $db->qstr($workorder_history_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_workorder_history<br>
* Purpose:  Loads All workorder_history rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $workorder_historyArray Array  The paginated result set  of workorder_historys
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_workorder_history(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM workorder_history LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$workorder_historyArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_historyArray[$counter] = new workorder_history();
		$workorder_historyArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $workorder_historyArray;

}

function load_by_workorder_id($workorder_id) {

	global $db;
	global $error;
	
	$q ="SELECT * FROM workorder_history WHERE workorder_id = ". $db->qstr($workorder_id);
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$workorder_historyArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_historyArray[$counter] = new workorder_history();
		$workorder_historyArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $workorder_historyArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_workorder_history<br>
* Purpose:  Updates A single workorder_history row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_workorder_history($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE workorder_history SET
		workorder_id					=". $db->qstr($_REQUEST['workorder_id']) ."	,
		workorder_history_text					=". $db->qstr($_REQUEST['workorder_history_text']) ."	,
		workorder_history_create_date					=". $db->qstr($_REQUEST['workorder_history_create_date']) ."
	WHERE workorder_history_id = " . $db->qstr($_REQUEST['workorder_history_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_workorder_history<br>
* Purpose:  Deletes A single workorder_history row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_workorder_history($workorder_history_id){
	global $db;
	global $error;

	$q = "DELETE FROM workorder_history
	WHERE workorder_history_id = " . $db->qstr($workorder_history_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_by_workorder<br>
* Purpose:  Deletes All workorder_comment that belong to Work Order row<br>
*
* @author Cite CMS Module Developer
* @param String $workorder_id The workorder_id
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_by_workorder($workorder_id) {

	global $db;
	
	$q = "DELETE FROM workorder_history WHERE  workorder_id = " . $db->qstr( $workorder_id );
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	
	return true;

}

}
?>