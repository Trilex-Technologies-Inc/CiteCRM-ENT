<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     operating_system.class.php<br>
 * Purpose:  For all operating_system methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/operating_system_getter.class.php');

class operating_system extends operating_system_getter {

function add_operating_system($operating_system_manufacture_id,$operating_system_name,$operating_system_active){
	global $db;
	global $error;

	$q = "INSERT INTO  operating_system SET
		operating_system_manufacture_id	=". $db->qstr($operating_system_manufacture_id) .",
		operating_system_name			=". $db->qstr($operating_system_name) .",
		operating_system_active			=". $db->qstr($operating_system_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
 
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_operating_system<br>
* Purpose:  Loads A single operating_system row<br>
*
* @author Cite CMS Module Developer
* @param $operating_system_id String The operating_system ID
* @access Public
* @return operating_system Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_operating_system($operating_system_id){
	global $db;
	global $error;

	$q = "SELECT * FROM operating_system
	WHERE operating_system_id = ". $db->qstr($operating_system_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_operating_system<br>
* Purpose:  Loads All operating_system rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $operating_systemArray Array  The paginated result set  of operating_systems
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_operating_system(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM operating_system LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$operating_systemArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$operating_systemArray[$counter] = new operating_system();
		$operating_systemArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $operating_systemArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_by_operating_system_manufacture_id<br>
* Purpose:  Loads All operating_system rows by manufacture ID<br>
*
* @author Cite CMS Module Developer
* @param String $operating_system_manufacture_id The Manufacture ID

* @access Public
* @return $operating_systemArray Array of objects
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function load_by_operating_system_manufacture_id($operating_system_manufacture_id) {
	global $db;
	global $error;

	$q = "SELECT * FROM operating_system WHERE operating_system_manufacture_id = " . $db->qstr($operating_system_manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$operating_systemArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$operating_systemArray[$counter] = new operating_system();
		$operating_systemArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $operating_systemArray;

}



/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_operating_system<br>
* Purpose:  Updates A single operating_system row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_operating_system($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE operating_system SET
		operating_system_manufacture_id					=". $db->qstr($_REQUEST['operating_system_manufacture_id']) ."	,
		operating_system_active					=". $db->qstr($_REQUEST['operating_system_active']) ."
	WHERE operating_system_id = " . $db->qstr($_REQUEST['operating_system_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_operating_system<br>
* Purpose:  Deletes A single operating_system row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_operating_system($operating_system_id){
	global $db;
	global $error;

	$q = "DELETE FROM operating_system
	WHERE operating_system_id = " . $db->qstr($operating_system_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>