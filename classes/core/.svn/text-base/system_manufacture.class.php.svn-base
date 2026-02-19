<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     system_manufacture.class.php<br>
 * Purpose:  For all system_manufacture methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/system_manufacture_getter.class.php');

class system_manufacture extends system_manufacture_getter {

function add_system_manufacture($manufacture_abrv,$manufacture_name){
	global $db;
	global $error;

	$q = "INSERT INTO  system_manufacture SET
			manufacture_abrv					=". $db->qstr($manufacture_abrv) .",
			manufacture_name					=". $db->qstr($manufacture_name);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_system_manufacture<br>
* Purpose:  Loads A single system_manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $system_manufacture_id String The system_manufacture ID
* @access Public
* @return system_manufacture Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_system_manufacture($system_manufacture_id){
	global $db;
	global $error;

	$q = "SELECT * FROM system_manufacture
	WHERE system_manufacture_id = ". $db->qstr($system_manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_system_manufacture<br>
* Purpose:  Loads All system_manufacture rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $system_manufactureArray Array  The paginated result set  of system_manufactures
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_system_manufacture($field,$sort,$and,$start,$limit,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM system_manufacture
			WHERE 1 = 1
			$and
			ORDER BY $field  $sort LIMIT $start, $limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$system_manufactureArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$system_manufactureArray[$counter] = new system_manufacture();
		$system_manufactureArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $system_manufactureArray;

}

function load_all() {

	global $db;
	global $error;

	$q = "SELECT * FROM system_manufacture";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$system_manufactureArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$system_manufactureArray[$counter] = new system_manufacture();
		$system_manufactureArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $system_manufactureArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_system_manufacture<br>
* Purpose:  Updates A single system_manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_system_manufacture($manufacture_abrv,$manufacture_name,$system_manufacture_id){
	global $db;
	global $error;

	$q = "UPDATE system_manufacture SET
		manufacture_abrv					=". $db->qstr($manufacture_abrv) ."	,
		manufacture_name					=". $db->qstr($manufacture_name) ."
	WHERE system_manufacture_id = " . $db->qstr($system_manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_system_manufacture<br>
* Purpose:  Deletes A single system_manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_system_manufacture($system_manufacture_id){
	global $db;
	global $error;

	$q = "DELETE FROM system_manufacture
	WHERE system_manufacture_id = " . $db->qstr($system_manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>