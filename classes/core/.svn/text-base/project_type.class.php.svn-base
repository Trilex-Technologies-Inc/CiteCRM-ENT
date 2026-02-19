<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     project_type.class.php<br>
 * Purpose:  For all project_type methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/project_type_getter.class.php');

class project_type extends project_type_getter {

function add_project_type(){
	global $db;
	global $error;

	$q = "INSERT INTO  project_type SET
		project_type_name					=". $db->qstr($_REQUEST['project_type_name']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_project_type<br>
* Purpose:  Loads A single project_type row<br>
*
* @author Cite CMS Module Developer
* @param $project_type_id String The project_type ID
* @access Public
* @return project_type Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_project_type($project_type_id){
	global $db;
	global $error;

	$q = "SELECT * FROM project_type
	WHERE project_type_id = ". $db->qstr($project_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_project_type<br>
* Purpose:  Loads All project_type rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $project_typeArray Array  The paginated result set  of project_types
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_project_type(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM project_type LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$project_typeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$project_typeArray[$counter] = new project_type();
		$project_typeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $project_typeArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_project_type<br>
* Purpose:  Updates A single project_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_project_type($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE project_type SET
		project_type_name					=". $db->qstr($_REQUEST['project_type_name']) ."
	WHERE project_type_id = " . $db->qstr($_REQUEST['project_type_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_project_type<br>
* Purpose:  Deletes A single project_type row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_project_type($project_type_id){
	global $db;
	global $error;

	$q = "DELETE FROM project_type
	WHERE project_type_id = " . $db->qstr($project_type_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>