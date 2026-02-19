<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     category.class.php<br>
 * Purpose:  For all category methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require_once(CLASS_PATH.'/getter/category_getter.class.php');

class category extends category_getter {


function category(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("category");
	if(!empty($translate_array)) {
		foreach($translate_array as $translate){
			$tans = "translate_".strtolower($translate['name']);
			$val = $translate['content'];
			$smarty->assign($tans,$val);
		}
	}
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     add_category<br>
* Purpose:  Adds A single category row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return category Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_category(){
	global $db;
	global $error;

	$q = "INSERT INTO  category SET
		category_image					=". $db->qstr($_REQUEST['category_image']) .",
		category_parent_id					=". $db->qstr($_REQUEST['category_parent_id']) .",
		category_sort_order					=". $db->qstr($_REQUEST['category_sort_order']) .",
		category_status					=". $db->qstr($_REQUEST['category_status']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_category<br>
* Purpose:  Loads A single category row<br>
*
* @author Cite CMS Module Developer
* @param $category_id String The category ID
* @access Public
* @return category Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_category($category_id){
	global $db;
	global $error;

	$q = "SELECT * FROM category
	WHERE category_id = ". $db->qstr($category_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_category<br>
* Purpose:  Loads All category rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $categoryArray Array  The paginated result set  of categorys
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_category(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM category LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$categoryArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$categoryArray[$counter] = new category();
		$categoryArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $categoryArray;

}


function loadParent($parentID, &$total, $start = 0, $limit=50) {
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * FROM category WHERE category_parent_id=" . $db->qstr($parentID) . " LIMIT $start, $limit";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$categoryArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$categoryArray[$counter] = new category();
		$categoryArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $categoryArray;

}



function loadParentIDBYChild($childID) {
	global $db;
	global $error;
	
	$q = "SELECT category_parent_id FROM category WHERE category_id = " . $db->qstr($childID);
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	return $rs->fields['category_parent_id'];

}

function loadNameByID($categoryID){

	global $db;
	global $error;
	
	$q = "SELECT category_name FROM category WHERE category_id = " . $db->qstr($categoryID);
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
}


function loadAll() {
	global $db;
	global $error;
	
	$q = "SELECT 
				category.category_name AS parent_name,
				category.category_id AS parent_id, 
				cc.category_name AS child_name,
				cc.category_id AS child_id
			FROM category
			LEFT JOIN  category cc ON cc.category_parent_id = category.category_id 
			WHERE cc.category_parent_id > 0";

	if(!$rs = $db->Execute($q)) {
		echo $db->ErrorMsg();
	}

	$categoryArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$categoryArray[$counter] = new category();
		$categoryArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	return $categoryArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_category<br>
* Purpose:  Updates A single category row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_category($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE category SET
		category_image					=". $db->qstr($_REQUEST['category_image']) ."	,
		category_parent_id					=". $db->qstr($_REQUEST['category_parent_id']) ."	,
		category_sort_order					=". $db->qstr($_REQUEST['category_sort_order']) ."	,
		category_status					=". $db->qstr($_REQUEST['category_status']) ."
	WHERE category_id = " . $db->qstr($_REQUEST['category_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_category<br>
* Purpose:  Deletes A single category row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_category($category_id){
	global $db;
	global $error;

	$q = "DELETE FROM category
	WHERE category_id = " . $db->qstr($category_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>