<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     project_status.class.php<br>
 * Purpose:  For all project_status methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/project_status_getter.class.php');

class project_status extends project_status_getter {

function add_project_status(){
	global $db;
	global $error;

	$q = "INSERT INTO  project_status SET
		project_status_name					=". $db->qstr($_REQUEST['project_status_name']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_project_status<br>
* Purpose:  Loads A single project_status row<br>
*
* @author Cite CMS Module Developer
* @param $project_status_id String The project_status ID
* @access Public
* @return project_status Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_project_status($project_status_id){
	global $db;
	global $error;

	$q = "SELECT * FROM project_status
	WHERE project_status_id = ". $db->qstr($project_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_project_status<br>
* Purpose:  Loads All project_status rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $project_statusArray Array  The paginated result set  of project_statuss
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_project_status(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM project_status LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$project_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$project_statusArray[$counter] = new project_status();
		$project_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $project_statusArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_project_status<br>
* Purpose:  Updates A single project_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_project_status($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE project_status SET
		project_status_name					=". $db->qstr($_REQUEST['project_status_name']) ."
	WHERE project_status_id = " . $db->qstr($_REQUEST['project_status_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_project_status<br>
* Purpose:  Deletes A single project_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_project_status($project_status_id){
	global $db;
	global $error;

	$q = "DELETE FROM project_status
	WHERE project_status_id = " . $db->qstr($project_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_in_array<br>
* Purpose:  Loads all rows into Array of Objects<br>
*
* @author Cite CMS Module Developer
* 
* @access Public
* @return $project_statusArray Array of Objects
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function load_in_array() {
	global $db;
	global $error;
	
	$q =  "SELECT project_status_id,project_status_name FROM project_status";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$project_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$project_statusArray[$counter] = new project_status();
		$project_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $project_statusArray;

}

}
?>