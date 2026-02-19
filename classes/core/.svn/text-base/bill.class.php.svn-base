<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     bill.class.php<br>
 * Purpose:  For all bill methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/bill_getter.class.php');

class bill extends bill_getter {

function add_bill(){
	global $db;
	global $error;

	$q = "INSERT INTO  bill SET
		vendor_id					=". $db->qstr($_REQUEST['vendor_id']) .",
		bill_date_create					=". $db->qstr($_REQUEST['bill_date_create']) .",
		bill_due_date					=". $db->qstr($_REQUEST['bill_due_date']) .",
		bill_amount_due					=". $db->qstr($_REQUEST['bill_amount_due']) .",
		bill_amount_paid					=". $db->qstr($_REQUEST['bill_amount_paid']) .",
		bill_ref_num					=". $db->qstr($_REQUEST['bill_ref_num']) .",
		bill_memo					=". $db->qstr($_REQUEST['bill_memo']) .",
		bill_paid					=". $db->qstr($_REQUEST['bill_paid']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_bill<br>
* Purpose:  Loads A single bill row<br>
*
* @author Cite CMS Module Developer
* @param $bill_id String The bill ID
* @access Public
* @return bill Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_bill($bill_id){
	global $db;
	global $error;

	$q = "SELECT * FROM bill
	WHERE bill_id = ". $db->qstr($bill_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_bill<br>
* Purpose:  Loads All bill rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $billArray Array  The paginated result set  of bills
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_bill(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM bill LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$billArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$billArray[$counter] = new bill();
		$billArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $billArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_bill<br>
* Purpose:  Updates A single bill row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_bill($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE bill SET
		vendor_id					=". $db->qstr($_REQUEST['vendor_id']) ."	,
		bill_date_create					=". $db->qstr($_REQUEST['bill_date_create']) ."	,
		bill_due_date					=". $db->qstr($_REQUEST['bill_due_date']) ."	,
		bill_amount_due					=". $db->qstr($_REQUEST['bill_amount_due']) ."	,
		bill_amount_paid					=". $db->qstr($_REQUEST['bill_amount_paid']) ."	,
		bill_ref_num					=". $db->qstr($_REQUEST['bill_ref_num']) ."	,
		bill_memo					=". $db->qstr($_REQUEST['bill_memo']) ."	,
		bill_paid					=". $db->qstr($_REQUEST['bill_paid']) ."
	WHERE bill_id = " . $db->qstr($_REQUEST['bill_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_bill<br>
* Purpose:  Deletes A single bill row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_bill($bill_id){
	global $db;
	global $error;

	$q = "DELETE FROM bill
	WHERE bill_id = " . $db->qstr($bill_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


}
?>