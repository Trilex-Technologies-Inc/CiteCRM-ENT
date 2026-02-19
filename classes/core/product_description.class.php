<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     product_description.class.php<br>
 * Purpose:  For all product_description methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/product_description_getter.class.php');

class product_description extends product_description_getter {


function product_description(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("product_description");
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
* Name:     add_product_description<br>
* Purpose:  Adds A single product_description row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return product_description Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_product_description(){
	global $db;
	global $error;

	$q = "INSERT INTO  product_description SET
		product_id					= ". $db->qstr($_REQUEST['product_id']) .",
		product_name				= ". $db->qstr($_REQUEST['product_name']) .",
		product_description			= ". $db->qstr($_REQUEST['product_description']) .",
		product_url					= ". $db->qstr($_REQUEST['product_url']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


    return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_product_description<br>
* Purpose:  Loads A single product_description row<br>
*
* @author Cite CMS Module Developer
* @param $product_description_id String The product_description ID
* @access Public
* @return product_description Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_product_description($product_description_id){
	global $db;
	global $error;

	$q = "SELECT * FROM product_description
	WHERE product_description_id = ". $db->qstr($product_description_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}
function load_by_product_id($product_id) {
    global $db;
	global $error;

	$q = "SELECT * FROM product_description
	WHERE product_id = ". $db->qstr($product_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_product_description<br>
* Purpose:  Loads All product_description rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $product_descriptionArray Array  The paginated result set  of product_descriptions
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_product_description(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM product_description LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$product_descriptionArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$product_descriptionArray[$counter] = new product_description();
		$product_descriptionArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $product_descriptionArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_product_description<br>
* Purpose:  Updates A single product_description row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_product_description($product_description_id,$product_url,$product_description,$product_name){
	global $db;
	global $error;

	$q = "UPDATE product_description SET
		product_name				= " . $db->qstr($product_name) . "	,
		product_description			= " . $db->qstr($product_description) . "	,
		product_url					= " . $db->qstr($product_url) . "
	WHERE product_description_id    = " . $db->qstr($product_description_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_product_description<br>
* Purpose:  Deletes A single product_description row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_product_description($product_description_id){
	global $db;
	global $error;

	$q = "DELETE FROM product_description
	WHERE product_description_id = " . $db->qstr($product_description_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>