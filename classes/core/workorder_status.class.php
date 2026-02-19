<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     workorder_status.class.php<br>
 * Purpose:  For all workorder_status methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/workorder_status_getter.class.php');

class workorder_status extends workorder_status_getter {

function add_workorder_status(){
	global $db;
	global $error;

	$q = "INSERT INTO  workorder_status SET
		workorder_status_text					=". $db->qstr($_REQUEST['workorder_status_text']) .",
		workorder_status_order					=". $db->qstr($_REQUEST['workorder_status_order']).",
		workorder_status_active					=". $db->qstr($_REQUEST['workorder_status_active']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_workorder_status<br>
* Purpose:  Loads A single workorder_status row<br>
*
* @author Cite CMS Module Developer
* @param $workorder_status_id String The workorder_status ID
* @access Public
* @return workorder_status Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_workorder_status($workorder_status_id){
	global $db;
	global $error;

	$q = "SELECT * FROM workorder_status
	WHERE workorder_status_id = ". $db->qstr($workorder_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_workorder_status<br>
* Purpose:  Loads All workorder_status rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $workorder_statusArray Array  The paginated result set  of workorder_statuss
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_workorder_status(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM workorder_status ORDER BY  workorder_status_order LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$workorder_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_statusArray[$counter] = new workorder_status();
		$workorder_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $workorder_statusArray;

}

function load_all() {
	global $db;
	global $error;
	
	$q = "SELECT * FROM workorder_status WHERE workorder_status_active='1' ORDER BY  workorder_status_order";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorder_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_statusArray[$counter] = new workorder_status();
		$workorder_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $workorder_statusArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_workorder_status<br>
* Purpose:  Updates A single workorder_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_workorder_status($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE workorder_status SET
		workorder_status_text					=". $db->qstr($_REQUEST['workorder_status_text']) ."	,
		workorder_status_order					=". $db->qstr($_REQUEST['workorder_status_order']).",
		workorder_status_active					=". $db->qstr($_REQUEST['workorder_status_active']) ."
	WHERE workorder_status_id = " . $db->qstr($_REQUEST['workorder_status_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_workorder_status<br>
* Purpose:  Deletes A single workorder_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_workorder_status($workorder_status_id){
	global $db;
	global $error;

	$q = "DELETE FROM workorder_status
	WHERE workorder_status_id = " . $db->qstr($workorder_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>