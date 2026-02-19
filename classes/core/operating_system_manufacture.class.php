<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     operating_system_manufacture.class.php<br>
 * Purpose:  For all operating_system_manufacture methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/operating_system_manufacture_getter.class.php');

class operating_system_manufacture extends operating_system_manufacture_getter {

function add_operating_system_manufacture($operating_system_manufacture_name,$operating_system_manufacture_website,$operating_system_manufacture_active){
	global $db;
	global $error;

	$q = "INSERT INTO  operating_system_manufacture SET
		operating_system_manufacture_name					=". $db->qstr($operating_system_manufacture_name) .",
		operating_system_manufacture_website				=". $db->qstr($operating_system_manufacture_website) .",
		operating_system_manufacture_active					=". $db->qstr($operating_system_manufacture_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_operating_system_manufacture<br>
* Purpose:  Loads A single operating_system_manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $operating_system_manufacture_id String The operating_system_manufacture ID
* @access Public
* @return operating_system_manufacture Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_operating_system_manufacture($operating_system_manufacture_id){
	global $db;
	global $error;

	$q = "SELECT * FROM operating_system_manufacture
	WHERE operating_system_manufacture_id = ". $db->qstr($operating_system_manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_operating_system_manufacture<br>
* Purpose:  Loads All operating_system_manufacture rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $operating_system_manufactureArray Array  The paginated result set  of operating_system_manufactures
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_operating_system_manufacture($field,$sort,$and,$start,$limit,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM operating_system_manufacture 
			WHERE 1 = 1
			$and
			ORDER BY $field  $sort LIMIT $start, $limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$operating_system_manufactureArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$operating_system_manufactureArray[$counter] = new operating_system_manufacture();
		$operating_system_manufactureArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $operating_system_manufactureArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_all()<br>
* Purpose:  Loads All operating_system_manufacture rows <br>
*
* @author Cite CMS Module Developer
* @access Public
* @return $operating_system_manufactureArray Array of operating_system_manufacture objects
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function load_all() {
	global $db;
	global $error;
	
	$q = "SELECT * FROM operating_system_manufacture WHERE operating_system_manufacture_active='1' ORDER BY  operating_system_manufacture_name";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	

	$operating_system_manufactureArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$operating_system_manufactureArray[$counter] = new operating_system_manufacture();
		$operating_system_manufactureArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $operating_system_manufactureArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_operating_system_manufacture<br>
* Purpose:  Updates A single operating_system_manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_operating_system_manufacture($operating_system_manufacture_name,$operating_system_manufacture_website,$operating_system_manufacture_active,$operating_system_manufacture_id){
	global $db;
	global $error;

	$q = "UPDATE operating_system_manufacture SET
		operating_system_manufacture_name		= " . $db->qstr($operating_system_manufacture_name) ."	,
		operating_system_manufacture_website	= " . $db->qstr($operating_system_manufacture_website) ."	,
		operating_system_manufacture_active		= " . $db->qstr($operating_system_manufacture_active) ."
	WHERE operating_system_manufacture_id 		= " . $db->qstr($operating_system_manufacture_id);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_operating_system_manufacture<br>
* Purpose:  Deletes A single operating_system_manufacture row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_operating_system_manufacture($operating_system_manufacture_id){
	global $db;
	global $error;

	$q = "DELETE FROM operating_system_manufacture
	WHERE operating_system_manufacture_id = " . $db->qstr($operating_system_manufacture_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>