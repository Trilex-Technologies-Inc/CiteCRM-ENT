<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     invoice_part.class.php<br>
 * Purpose:  For all invoice_part methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/invoice_part_getter.class.php');

class invoice_part extends invoice_part_getter {


function invoice_part(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("invoice_part");
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
* Name:     add_invoice_part<br>
* Purpose:  Adds A single invoice_part row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return invoice_part Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_invoice_part($invoice_id,$product_id,$invoice_part_qty,$invoice_part_amount,$invoice_part_sub_total){
	global $db;
	global $error;

	$q = "INSERT INTO  invoice_part SET
		invoice_id					=". $db->qstr($invoice_id) .",
		product_id					=". $db->qstr($product_id) .",
		invoice_part_qty			=". $db->qstr($invoice_part_qty) .",
		invoice_part_amount		=". $db->qstr($invoice_part_amount) .",
		invoice_part_sub_total	=". $db->qstr($invoice_part_sub_total);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_invoice_part<br>
* Purpose:  Loads A single invoice_part row<br>
*
* @author Cite CMS Module Developer
* @param $invoice_part_id String The invoice_part ID
* @access Public
* @return invoice_part Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_invoice_part($invoice_part_id){
	global $db;
	global $error;

	$q = "SELECT * FROM invoice_part
	WHERE invoice_part_id = ". $db->qstr($invoice_part_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_invoice_part<br>
* Purpose:  Loads All invoice_part rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $invoice_partArray Array  The paginated result set  of invoice_parts
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_invoice_part(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM invoice_part LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$invoice_partArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$invoice_partArray[$counter] = new invoice_part();
		$invoice_partArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $invoice_partArray;

}


function load_by_invoice_id($invoice_id) {
	global $db;
	global $error;

	$q = "SELECT * 
			FROM invoice_part 
			LEFT JOIN product ON invoice_part.product_id = product.product_id
			WHERE  invoice_id = " . $db->qstr($invoice_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$invoice_partArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$invoice_partArray[$counter] = new invoice_part();
		$invoice_partArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	return $invoice_partArray;
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_invoice_part<br>
* Purpose:  Updates A single invoice_part row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_invoice_part($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE invoice_part SET
		invoice_id					=". $db->qstr($_REQUEST['invoice_id']) ."	,
		product_id					=". $db->qstr($_REQUEST['product_id']) ."	,
		invoice_part_qty					=". $db->qstr($_REQUEST['invoice_part_qty']) ."	,
		invoice_part_amount					=". $db->qstr($_REQUEST['invoice_part_amount']) ."	,
		invoice_part_sub_total					=". $db->qstr($_REQUEST['invoice_part_sub_total']) ."
	WHERE invoice_part_id = " . $db->qstr($_REQUEST['invoice_part_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_invoice_part<br>
* Purpose:  Deletes A single invoice_part row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_invoice_part($invoice_part_id){
	global $db;
	global $error;

	$q = "DELETE FROM invoice_part
	WHERE invoice_part_id = " . $db->qstr($invoice_part_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>