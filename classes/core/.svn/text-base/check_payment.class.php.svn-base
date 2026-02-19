<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     check_payment.class.php<br>
 * Purpose:  For all check_payment methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/check_payment_getter.class.php');

class check_payment extends check_payment_getter {


function check_payment(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("check_payment");
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
    * Name:     add_check_payment<br>
    * Purpose:  Adds A single check_payment row<br>
    *
    * @author Cite CMS Module Developer
    * @access Public
    * @return check_payment Object
    * @version 1.0
    * @uses $db Datbase object, $error the Error object
    */
    function add_check_payment($invoice_id,$check_payment_amount,$check_payment_number,$check_payment_enter_by,$check_payment_date,$check_payment_status){
        global $db;
        global $error;
    
        $q = "INSERT INTO  check_payment SET
            invoice_id					=". $db->qstr($invoice_id) .",
            check_payment_amount		=". $db->qstr($check_payment_amount) .",
            check_payment_number		=". $db->qstr($check_payment_number) .",
            check_payment_enter_by		=". $db->qstr($check_payment_enter_by) .",
            check_payment_date			=". $db->qstr($check_payment_date) .",
            check_payment_status		=". $db->qstr($check_payment_status);
    


        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
        $_SESSION['CLEAR_CACHE'] = true;
    
        return $db->Insert_ID();
    }


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_check_payment<br>
* Purpose:  Loads A single check_payment row<br>
*
* @author Cite CMS Module Developer
* @param $check_payment_id String The check_payment ID
* @access Public
* @return check_payment Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_check_payment($check_payment_id){
	global $db;
	global $error;

	$q = "SELECT * FROM check_payment
	WHERE check_payment_id = ". $db->qstr($check_payment_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_check_payment<br>
* Purpose:  Loads All check_payment rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $check_paymentArray Array  The paginated result set  of check_payments
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_check_payment(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM check_payment LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$check_paymentArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$check_paymentArray[$counter] = new check_payment();
		$check_paymentArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $check_paymentArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_check_payment<br>
* Purpose:  Updates A single check_payment row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_check_payment($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE check_payment SET
		invoice_id					=". $db->qstr($_REQUEST['invoice_id']) ."	,
		check_payment_amount					=". $db->qstr($_REQUEST['check_payment_amount']) ."	,
		check_payment_number					=". $db->qstr($_REQUEST['check_payment_number']) ."	,
		check_payment_enter_by					=". $db->qstr($_REQUEST['check_payment_enter_by']) ."	,
		check_payment_date					=". $db->qstr($_REQUEST['check_payment_date']) ."	,
		check_payment_status					=". $db->qstr($_REQUEST['check_payment_status']) ."
	WHERE check_payment_id = " . $db->qstr($_REQUEST['check_payment_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_check_payment<br>
* Purpose:  Deletes A single check_payment row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_check_payment($check_payment_id){
	global $db;
	global $error;

	$q = "DELETE FROM check_payment
	WHERE check_payment_id = " . $db->qstr($check_payment_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


}
?>