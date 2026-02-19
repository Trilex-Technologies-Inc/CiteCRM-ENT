<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     product_to_category.class.php<br>
 * Purpose:  For all product_to_category methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/product_to_category_getter.class.php');

class product_to_category extends product_to_category_getter {


function product_to_category(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("product_to_category");
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
* Name:     add_product_to_category<br>
* Purpose:  Adds A single product_to_category row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return product_to_category Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_product_to_category($category_id,$product_id){
	global $db;
	global $error;

	$q = "INSERT INTO  product_to_category SET
		product_id					=". $db->qstr($product_id) .",
		category_id					=". $db->qstr($category_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_product_to_category<br>
* Purpose:  Loads A single product_to_category row<br>
*
* @author Cite CMS Module Developer
* @param $product_to_category_id String The product_to_category ID
* @access Public
* @return product_to_category Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_product_to_category($product_to_category_id){
	global $db;
	global $error;

	$q = "SELECT * FROM product_to_category
	WHERE product_to_category_id = ". $db->qstr($product_to_category_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_product_to_category<br>
* Purpose:  Loads All product_to_category rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $product_to_categoryArray Array  The paginated result set  of product_to_categorys
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_product_to_category(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM product_to_category LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$product_to_categoryArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$product_to_categoryArray[$counter] = new product_to_category();
		$product_to_categoryArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $product_to_categoryArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_product_to_category<br>
* Purpose:  Updates A single product_to_category row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_product_to_category($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE product_to_category SET
		product_id					=". $db->qstr($_REQUEST['product_id']) ."	,
		category_id					=". $db->qstr($_REQUEST['category_id']) ."
	WHERE product_to_category_id = " . $db->qstr($_REQUEST['product_to_category_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_product_to_category<br>
* Purpose:  Deletes A single product_to_category row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_product_to_category($product_to_category_id){
	global $db;
	global $error;

	$q = "DELETE FROM product_to_category
	WHERE product_to_category_id = " . $db->qstr($product_to_category_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>