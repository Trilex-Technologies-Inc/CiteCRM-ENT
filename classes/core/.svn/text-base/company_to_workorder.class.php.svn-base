<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     company_to_workorder.class.php<br>
 * Purpose:  For all company_to_workorder methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/company_to_workorder_getter.class.php');

class company_to_workorder extends company_to_workorder_getter {

function add_company_to_workorder($workorder_id,$company_id){
	global $db;
	global $error;

	$q = "INSERT INTO  company_to_workorder SET
		company_id	   =". $db->qstr($company_id) .",
		workorder_id   =". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_company_to_workorder<br>
* Purpose:  Loads A single company_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $company_to_workorder_id String The company_to_workorder ID
* @access Public
* @return company_to_workorder Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_company_to_workorder($company_to_workorder_id){
	global $db;
	global $error;

	$q = "SELECT * FROM company_to_workorder
	WHERE company_to_workorder_id = ". $db->qstr($company_to_workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_company_to_workorder<br>
* Purpose:  Loads All company_to_workorder rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $company_to_workorderArray Array  The paginated result set  of company_to_workorders
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_company_to_workorder(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM company_to_workorder LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$company_to_workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$company_to_workorderArray[$counter] = new company_to_workorder();
		$company_to_workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $company_to_workorderArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_company_to_workorder<br>
* Purpose:  Updates A single company_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_company_to_workorder($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE company_to_workorder SET
		company_id					=". $db->qstr($_REQUEST['company_id']) ."	,
		workorder_id					=". $db->qstr($_REQUEST['workorder_id']) ."
	WHERE company_to_workorder_id = " . $db->qstr($_REQUEST['company_to_workorder_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_company_to_workorder<br>
* Purpose:  Deletes A single company_to_workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_company_to_workorder($company_to_workorder_id){
	global $db;
	global $error;

	$q = "DELETE FROM company_to_workorder
	WHERE company_to_workorder_id = " . $db->qstr($company_to_workorder_id);

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
	
	$q = "DELETE FROM company_to_workorder WHERE  workorder_id = " . $db->qstr( $workorder_id );
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	
	return true;

}
}
?>