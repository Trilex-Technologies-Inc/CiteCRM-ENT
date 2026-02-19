<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     system_to_workorder.class.php<br>
 * Purpose:  For all system_to_workorder methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/system_to_workorder_getter.class.php');

class system_to_workorder extends system_to_workorder_getter {

function add_system_to_workorder($workorder_id,$system_id){
	global $db;
	global $error;

	$q = "INSERT INTO  system_to_workorder SET
		system_id						=". $db->qstr($system_id) .",
		workorder_id					=". $db->qstr($workorder_id);


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_system_to_workorder<br>
* Purpose:  Loads A single system_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $system_to_workorder_id String The system_to_workorder ID
* @access Public
* @return system_to_workorder Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_system_to_workorder($system_to_workorder_id){
	global $db;
	global $error;

	$q = "SELECT * FROM system_to_workorder
	WHERE system_to_workorder_id = ". $db->qstr($system_to_workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_system_to_workorder<br>
* Purpose:  Loads All system_to_workorder rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $system_to_workorderArray Array  The paginated result set  of system_to_workorders
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_system_to_workorder(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM system_to_workorder LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$system_to_workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$system_to_workorderArray[$counter] = new system_to_workorder();
		$system_to_workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $system_to_workorderArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_system_to_workorder<br>
* Purpose:  Updates A single system_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_system_to_workorder($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE system_to_workorder SET
		system_id					=". $db->qstr($_REQUEST['system_id']) ."	,
		workorder_id					=". $db->qstr($_REQUEST['workorder_id']) ."
	WHERE system_to_workorder_id = " . $db->qstr($_REQUEST['system_to_workorder_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_system_to_workorder<br>
* Purpose:  Deletes A single system_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_system_to_workorder($system_id,$workorder_id){
	global $db;
	global $error;

	$q = "DELETE FROM system_to_workorder
			WHERE  system_id 			= " . $db->qstr($system_id) ."
			AND  workorder_id   	 	= " . $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	$q = "DELETE FROM product_to_system WHERE
			system_id	= " . $db->qstr($system_id) . "
			AND workorder_id = " . $db->qstr($workorder_id);
			
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
	
	$q = "DELETE FROM system_to_workorder WHERE  workorder_id = " . $db->qstr( $workorder_id );
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	
	return true;

}


function load_product_by_system_workorder($system_id,$workorder_id){
	global $db;
	global $error;
	
	$q = "SELECT * FROM product_to_system
			WHERE system_id = " . $db->qstr($system_id) . "
			AND workorder_id = " . $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$system_to_workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$system_to_workorderArray[$counter] = new system_to_workorder();
		$system_to_workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $system_to_workorderArray;


}


function remove_map($workorder_id,$product_id) {
	global $db;
	global $error;

	$q = "DELETE FROM product_to_workorder 
			WHERE workorder_id 	= " . $db->qstr($workorder_id) . "
			AND product_id		= " . $db->qstr($product_id);
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
}

}
?>