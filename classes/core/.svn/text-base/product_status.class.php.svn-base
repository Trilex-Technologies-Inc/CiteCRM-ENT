<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     product_status.class.php<br>
 * Purpose:  For all product_status methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/product_status_getter.class.php');

class product_status extends product_status_getter {


function product_status(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("product_status");
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
* Name:     add_product_status<br>
* Purpose:  Adds A single product_status row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return product_status Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_product_status(){
	global $db;
	global $error;

	$q = "INSERT INTO  product_status SET
		product_status_text					=". $db->qstr($_REQUEST['product_status_text']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_product_status<br>
* Purpose:  Loads A single product_status row<br>
*
* @author Cite CMS Module Developer
* @param $product_status_id String The product_status ID
* @access Public
* @return product_status Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_product_status($product_status_id){
	global $db;
	global $error;

	$q = "SELECT * FROM product_status
	WHERE product_status_id = ". $db->qstr($product_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_product_status<br>
* Purpose:  Loads All product_status rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $product_statusArray Array  The paginated result set  of product_statuss
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_product_status(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM product_status LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$product_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$product_statusArray[$counter] = new product_status();
		$product_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $product_statusArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     loadAll<br>
* Purpose:  Loads all product status objects<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return Array product_status Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function loadAll() {

	global $db;
	global $error;
	
	$q = "SELECT * FROM product_status";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$product_statusArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$product_statusArray[$counter] = new product_status();
		$product_statusArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $product_statusArray;
	
}



/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_product_status<br>
* Purpose:  Updates A single product_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_product_status($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE product_status SET
		product_status_text					=". $db->qstr($_REQUEST['product_status_text']) ."
	WHERE product_status_id = " . $db->qstr($_REQUEST['product_status_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_product_status<br>
* Purpose:  Deletes A single product_status row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_product_status($product_status_id){
	global $db;
	global $error;

	$q = "DELETE FROM product_status
	WHERE product_status_id = " . $db->qstr($product_status_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>