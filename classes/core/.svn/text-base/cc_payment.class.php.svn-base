<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     cc_payment.class.php<br>
 * Purpose:  For all cc_payment methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/cc_payment_getter.class.php');

class cc_payment extends cc_payment_getter {


function cc_payment(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("cc_payment");
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
    * Name:     add_cc_payment<br>
    * Purpose:  Adds A single cc_payment row<br>
    *
    * @author Cite CMS Module Developer
    * @access Public
    * @return cc_payment Object
    * @version 1.0
    * @uses $db Datbase object, $error the Error object
    */
    function add_cc_payment($invoice_id,$cc_payment_amount,$cc_payment_number,$cc_payment_expirdate,$cc_payment_enter_by,$cc_payment_billing_attempt,$cc_payment_status,$cc_payment_date,$cc_payment_date_proc){
        global $db;
        global $error;
    
        $q = "INSERT INTO  cc_payment SET
            invoice_id					=". $db->qstr($invoice_id) .",
            cc_payment_amount			=". $db->qstr($cc_payment_amount) .",
            cc_payment_number			=". $db->qstr($cc_payment_number) .",
            cc_payment_expirdate		=". $db->qstr($cc_payment_expirdate) .",
            cc_payment_enter_by			=". $db->qstr($cc_payment_enter_by) .",
            cc_payment_billing_attempt	=". $db->qstr($cc_payment_billing_attempt) .",
            cc_payment_status			=". $db->qstr($cc_payment_status) .",
            cc_payment_date				=". $db->qstr($cc_payment_date) .",
            cc_payment_date_proc		=". $db->qstr($cc_payment_date_proc);
    
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
        $_SESSION['CLEAR_CACHE'] = true;
        
        return $db->Insert_ID();
    }


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_cc_payment<br>
* Purpose:  Loads A single cc_payment row<br>
*
* @author Cite CMS Module Developer
* @param $cc_payment_id String The cc_payment ID
* @access Public
* @return cc_payment Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_cc_payment($cc_payment_id){
	global $db;
	global $error;

	$q = "SELECT * FROM cc_payment
	WHERE cc_payment_id = ". $db->qstr($cc_payment_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_cc_payment<br>
* Purpose:  Loads All cc_payment rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $cc_paymentArray Array  The paginated result set  of cc_payments
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_cc_payment(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM cc_payment LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$cc_paymentArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$cc_paymentArray[$counter] = new cc_payment();
		$cc_paymentArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $cc_paymentArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_cc_payment<br>
* Purpose:  Updates A single cc_payment row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_cc_payment($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE cc_payment SET
		invoice_id					=". $db->qstr($_REQUEST['invoice_id']) ."	,
		cc_payment_amount			=". $db->qstr($_REQUEST['cc_payment_amount']) ."	,
		cc_payment_number			=". $db->qstr($_REQUEST['cc_payment_number']) ."	,
		cc_payment_expirdate		=". $db->qstr($_REQUEST['cc_payment_expirdate']) ."	,
		cc_payment_enter_by			=". $db->qstr($_REQUEST['cc_payment_enter_by']) ."	,
		cc_payment_billing_attempt	=". $db->qstr($_REQUEST['cc_payment_billing_attempt']) ."	,
		cc_payment_status			=". $db->qstr($_REQUEST['cc_payment_status']) ."	,
		cc_payment_date				=". $db->qstr($_REQUEST['cc_payment_date']) ."	,
		cc_payment_date_proc		=". $db->qstr($_REQUEST['cc_payment_date_proc']) ."
	WHERE cc_payment_id = " . $db->qstr($_REQUEST['cc_payment_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_cc_payment<br>
* Purpose:  Deletes A single cc_payment row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_cc_payment($cc_payment_id){
	global $db;
	global $error;

	$q = "DELETE FROM cc_payment
	WHERE cc_payment_id = " . $db->qstr($cc_payment_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


    function authnet_values($cc_amount,$cc_number,$cc_ccv,$cc_expiry_date,$cust_id,$first_name,$last_name,$display_name,$address,$city,$state,$zip,$country,$cust_email,$cust_phone,$invoice_id,$inv_msg) {

        $authnet_values	= array (
            "x_ADC_Delim_Data"				=>"TRUE",
            "x_ADC_Relay_Response"		    =>"TRUE",
            "x_ADC_URL"						=>"FALSE",
            "x_Amount"						=>$cc_amount,
            "x_currency_code"				=>CURENCY_CODE,
            "x_Card_Num"					=>$cc_number,
            "x_card_code"					=>$cc_ccv,
            "x_Exp_Date"					=>$cc_expiry_date,
            "x_Login"						=>AN_LOGIN,
            "x_merchant_email"				=>SITE_EMAIL_ADMIN,
            "x_Method"						=>"CC",
            "x_Password"					=>AN_PASSWD,
            "x_Trans_ID"					=>"",
            "x_Type"						=>"AUTH_CAPTURE",
            "x_cust_id"						=>$cust_id,
            "x_first_name"					=>$first_name,
            "x_last_name"                   =>$last_name,
            "x_company"						=>$display_name,
            "x_address"						=>$address,
            "x_city"						=>$city,
            "x_state"						=>$state,
            "x_zip"							=>$zip,
            "x_country"						=>$country,
            "x_email"						=>$cust_email,
            "x_phone"						=>$cust_phone,
            "x_email_customer"				=>"FALSE",
            "x_ship_to_first_name"			=>$first_name,
            "x_ship_to_last_name"			=>$last_name,
            "x_ship_to_company"			    =>$display_name,
            "x_ship_to_address"			    =>$address,
            "x_ship_to_city"				=>$city,
            "x_ship_to_state"				=>$state,
            "x_ship_to_zip"					=>$zip,
            "x_ship_to_country"				=>$country,
            "x_tax"							=>"0.00",
            "x_invoice_num"					=>$invoice_id,
            "x_description"					=>$inv_msg,
            "x_Version"						=>"3.0",
            "x_Test_Request"				=>"TRUE"
            );

            $fields = "";
            foreach( $authnet_values as $key => $value ) $fields .= "$key=" . urlencode( $value ) . "&";

            return $fields;

    }


    function charge_an($fields) {

        $ch = curl_init("https://secure.authorize.net/gateway/transact.dll"); // URL of gateway for cURL to post to
        curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $fields, "& " )); // use HTTP POST to send form data
        ### curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response. ###
        $resp = curl_exec($ch); //execute post and get results
        curl_close ($ch);
        
        /* debug only code */
    
        $debug =0;
        if($debug ==1) {
                $text = $resp;
                $tok = strtok($text,"|");
                while(!($tok === FALSE)){
                    //while ($tok) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$tok."<br>";
                    $tok = strtok("|");
                }
        }

	   return $resp;


    }


    function auth_return($result) {
       
        $result = str_replace("\"", "", $result);
        $result = explode(",", $result);

        // Results
        $this->respCode               = $result[0]; // 1 Apporved, 2 Declined, 3 Error
        $this->respSubcode            = $result[1];
        $this->respReasonCode         = $result[2];
        $this->respReasonText         = $result[3];
        $this->respAporvalCode        = $result[4];
        $this->respAVSResult          = $result[5];
        $this->respTransactionID      = $result[6];
        $this->respInvoiceID          = $result[7];
        $this->respDescription        = $result[8];
        $this->respAmount             = $result[9];
        $this->respMethod             = $result[10];
        $this->respType               = $result[11];
        $this->respCustomerID         = $result[12];


       

        $msg = $this->proc_resp_code();

        return  $msg;

        //print_r($result);
       


    }


    function proc_resp_code(){

        switch ($this->respCode){

            // Aproved
            case "1":
                $msg ="APROVED. ";
                switch ($this->respReasonCode){
                    case "1":
                        $msg .=  "This Transaction Has Been Approved Transaction ID: " .$this->respTransactionID . " For $" .$this->respAmount   ;            
                    break;
                }

                $this->auth_success();
            break;
    
            // Declined
            case "2":
                $msg = "DECLINED. ";
                switch($this->respReasonCode){
                    case "2":
                        $msg .= "This Transaction Has Been Declined";
                    break;
        
                    case "3":
                        $msg .= "This Transaction Has Been Declined";
                    break;
                    
                    case "4":
                        $msg .= "This Transaction Has Been Declined";
                    break;
                }
                $this->auth_decline();
            break;


            // Error
            case "3":
                $msg = "DECLINED. ";

                switch($this->respReasonCode){
                    case "5":
                        $msg .= "A valid Amount is Required";
                    break;

                    case "6":
                        $msg .= "The Credit Card number is Invalid";
                    break;

                    case "7":
                        $msg .= "The Credit Card Expiration Date is Invalid";
                    break;
            
                    case "8":
                        $msg .= "The Credit Card has Expired";
                    break;

                    case "9":
                        $msg .= "The ABA Code is Invalid";
                    break;

                    case "10":
                        $msg .= "The Account Number is Invalid";
                    break;

                    case "11":
                        $msg .= "A Duplicate Transaction Has Been Submited";
                    break;

                    case "12":
                        $msg .= "An Authorization Code is Required But Not Present";
                    break;

                    case "13":
                        $msg .= "The Merchant API Login ID is invalid or the account is Inactive";
                    break;

                    case "14":
                        $msg .= "The Refer or Relay Respons URL is Invalid";
                    break;

                    case "15":
                        $msg .= "The Transaction ID is Invalid";
                    break;
                }
            
                $msg .= " Transaction ID: " .$this->respTransactionID . ". For the amount of $" .$this->respAmount;

                $this->auth_decline();

            break;

            
        }


        return $msg;

    }



    function auth_success() {
        global $db;
        global $error;

        // Update Set Invoice Paid
        $q = "UPDATE invoice SET
                invoice_status = 'Paid'
                WHERE invoice_id = " . $db->qstr($this->respInvoiceID);

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }
       
        // Update CC Payment
        $q = "UPDATE cc_payment SET
                cc_payment_billing_attempt  = cc_payment_billing_attempt +1,
                cc_payment_status           = 'Sucsess',
                cc_payment_date_proc        = " . $db->qstr(time()) . "
              WHERE invoice_id              = " . $db->qstr($this->respInvoiceID);
        
        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }


        // Close out Work Order
        require_once(CLASS_PATH."/core/invoice.class.php");
        require_once(CLASS_PATH."/core/workorder.class.php");

        $invoiceObj     = new Invoice();
        $workorderObj   = new Workorder();

        $invoiceObj->load_workorder_by_invoice($this->respInvoiceID);

        $workorderObj->close($invoiceObj->fields['workorder_id']);

        $this->_save_transaction();

    }

    function auth_decline(){
        global $db;
        global $error;

        // Update CC Payment
        $q = "UPDATE cc_payment SET
                cc_payment_billing_attempt  = cc_payment_billing_attempt +1,
                cc_payment_status           = 'Declined',
                cc_payment_date_proc        = " . $db->qstr(time()) . "
              WHERE invoice_id              = " . $db->qstr($this->respInvoiceID);
        
        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }


        $this->_save_transaction();

    }


    

    function _save_transaction(){


    }
}
?>