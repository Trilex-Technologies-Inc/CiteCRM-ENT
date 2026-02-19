<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     project.class.php<br>
 * Purpose:  For all project methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/project_getter.class.php');

class project extends project_getter {


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     add_project<br>
* Purpose:  Adds A single project row<br>
*
* @author Cite CMS Module Developer
* @param $project_id String The project ID
* @access Public
* @return project Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_project(){
	global $db;
	global $error;

	$q = "INSERT INTO  project SET
		project_name					=". $db->qstr($_REQUEST['project_name']) .",
		project_status_id					=". $db->qstr($_REQUEST['project_status_id']) .",
		project_create_date					=". $db->qstr($_REQUEST['project_create_date']) .",
		project_completed_date					=". $db->qstr($_REQUEST['project_completed_date']) .",
		project_type_id					=". $db->qstr($_REQUEST['project_type_id']) .",
		project_web_address					=". $db->qstr($_REQUEST['project_web_address']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_project<br>
* Purpose:  Loads A single project row<br>
*
* @author Cite CMS Module Developer
* @param $project_id String The project ID
* @access Public
* @return project Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_project($project_id){
	global $db;
	global $error;

	$q = "SELECT * FROM project
	WHERE project_id = ". $db->qstr($project_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_project<br>
* Purpose:  Loads All project rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $projectArray Array  The paginated result set  of projects
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_project(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM project LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$projectArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$projectArray[$counter] = new project();
		$projectArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $projectArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_project<br>
* Purpose:  Updates A single project row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_project($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE project SET
		project_name					=". $db->qstr($_REQUEST['project_name']) ."	,
		project_status_id					=". $db->qstr($_REQUEST['project_status_id']) ."	,
		project_create_date					=". $db->qstr($_REQUEST['project_create_date']) ."	,
		project_completed_date					=". $db->qstr($_REQUEST['project_completed_date']) ."	,
		project_type_id					=". $db->qstr($_REQUEST['project_type_id']) ."	,
		project_web_address					=". $db->qstr($_REQUEST['project_web_address']) ."
	WHERE project_id = " . $db->qstr($_REQUEST['project_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_project<br>
* Purpose:  Deletes A single project row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_project($project_id){
	global $db;
	global $error;

	$q = "DELETE FROM project
	WHERE project_id = " . $db->qstr($project_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>