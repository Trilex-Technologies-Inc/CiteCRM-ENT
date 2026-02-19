<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     system_model.class.php<br>
 * Purpose:  For all system_model methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/system_model_getter.class.php');

class system_model extends system_model_getter {

function add_system_model(){
	global $db;
	global $error;

	$q = "INSERT INTO  system_model SET
		system_manufacture_id					=". $db->qstr($_REQUEST['system_manufacture_id']) .",
		system_model_name					=". $db->qstr($_REQUEST['system_model_name']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_system_model<br>
* Purpose:  Loads A single system_model row<br>
*
* @author Cite CMS Module Developer
* @param $system_model_id String The system_model ID
* @access Public
* @return system_model Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_system_model($system_model_id){
	global $db;
	global $error;

	$q = "SELECT * FROM system_model
	WHERE system_model_id = ". $db->qstr($system_model_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_system_model<br>
* Purpose:  Loads All system_model rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $system_modelArray Array  The paginated result set  of system_models
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_system_model(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM system_model LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$system_modelArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$system_modelArray[$counter] = new system_model();
		$system_modelArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $system_modelArray;

}

function load_by_system_manufacture_id($system_manufacture_id) {

	global $db;
	global $error;
	
	
	$q = "SELECT * FROM system_model WHERE system_manufacture_id = " . $db->qstr($system_manufacture_id);
	

	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$system_modelArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$system_modelArray[$counter] = new system_model();
		$system_modelArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $system_modelArray;
	
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_system_model<br>
* Purpose:  Updates A single system_model row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_system_model($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE system_model SET
		system_manufacture_id					=". $db->qstr($_REQUEST['system_manufacture_id']) ."	,
		system_model_name					=". $db->qstr($_REQUEST['system_model_name']) ."
	WHERE system_model_id = " . $db->qstr($_REQUEST['system_model_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_system_model<br>
* Purpose:  Deletes A single system_model row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_system_model($system_model_id){
	global $db;
	global $error;

	$q = "DELETE FROM system_model
	WHERE system_model_id = " . $db->qstr($system_model_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>