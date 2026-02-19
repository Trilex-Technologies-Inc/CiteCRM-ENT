<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     credit_card.class.php<br>
 * Purpose:  For all credit_card methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/credit_card_getter.class.php');

class credit_card extends credit_card_getter {


	function credit_card(){
		global $smarty;
		global $translate;
		$translate = new translate();
		$translate_array = $translate->translate_module("credit_card");
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
	* Name:     add_credit_card<br>
	* Purpose:  Adds A single credit_card row<br>
	*
	* @author Cite CMS Module Developer
	* @access Public
	* @return credit_card Object
	* @version 1.0
	* @uses $db Datbase object, $error the Error object
	*/
	function add_credit_card(){
		global $db;
		global $error;
	
		$q = "INSERT INTO  credit_card SET
			credit_card_type					=". $db->qstr($_REQUEST['credit_card_type']) .",
			credit_card_name					=". $db->qstr($_REQUEST['credit_card_name']) .",
			credit_card_active					=". $db->qstr($_REQUEST['credit_card_active']);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
	$_SESSION['CLEAR_CACHE'] = true;
	
	return $db->Insert_ID();
	}
	
	
	/**
	*
	* Type:     Cite CMS Public Methods<br>
	* Name:     view_credit_card<br>
	* Purpose:  Loads A single credit_card row<br>
	*
	* @author Cite CMS Module Developer
	* @param $credit_card_id String The credit_card ID
	* @access Public
	* @return credit_card Object
	* @version 1.0
	* @uses $db Datbase object, $error the Error object
	*/
	function view_credit_card($credit_card_id){
		global $db;
		global $error;
	
		$q = "SELECT * FROM credit_card
		WHERE credit_card_id = ". $db->qstr($credit_card_id);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$tempArray = $rs->GetArray();
	
		$this->fields = $tempArray[0];
	
	}
	
	
	/**
	*
	* Type:     Cite CMS Public Methods<br>
	* Name:     search_credit_card<br>
	* Purpose:  Loads All credit_card rows paginated<br>
	*
	* @author Cite CMS Module Developer
	* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
	* @param  SmartyPaginate::getLimit() Smarty Paginate Object
	* @access Public
	* @return $credit_cardArray Array  The paginated result set  of credit_cards
	* @version 1.0
	* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
	*/
	function search_credit_card(){
		global $db;
		global $error;
	
		$q = "SELECT * FROM credit_card";
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$credit_cardArray = array();
	
		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$credit_cardArray[$counter] = new credit_card();
			$credit_cardArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		
		return $credit_cardArray;
	
	}
	
	
	/**
	*
	* Type:     Cite CMS Public Methods<br>
	* Name:     update_credit_card<br>
	* Purpose:  Updates A single credit_card row<br>
	*
	* @author Cite CMS Module Developer
	* @param $_REQUEST Array The Form Fields
	* @access Public
	* @return Boolen True/ False
	* @version 1.0
	* @uses $db Datbase object, $error the Error object
	*/
	function update_credit_card($credit_card_id,$credit_card_active){
		global $db;
		global $error;
	
		$q = "UPDATE credit_card SET
			credit_card_active		= " . $db->qstr($credit_card_active) ."
			WHERE credit_card_id 	= " . $db->qstr($credit_card_id);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	

		return true;
	}


	/**
	*
	* Type:     Cite CMS Public Methods<br>
	* Name:     delete_credit_card<br>
	* Purpose:  Deletes A single credit_card row<br>
	*
	* @author Cite CMS Module Developer
	* @param $_REQUEST Array The Form Fields
	* @access Public
	* @return Boolen True/ False
	* @version 1.0
	* @uses $db Datbase object, $error the Error object
	*/
	function delete_credit_card($credit_card_id){
		global $db;
		global $error;
	
		$q = "DELETE FROM credit_card
		WHERE credit_card_id = " . $db->qstr($credit_card_id);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
	$_SESSION['CLEAR_CACHE'] = true;
	
		return true;
	}


	function load_all_active() {
		global $db;
		global $error;

		$q ="SELECT * FROM credit_card WHERE credit_card_active = '1' ORDER BY credit_card_name";

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}


		$credit_cardArray = array();
	
		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$credit_cardArray[$counter] = new credit_card();
			$credit_cardArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}

		return $credit_cardArray;

	}

	// CC Methods
	 function validate_any($val_any){
        foreach($val_any as $key=> $val) {
            if($val == "") {
                $error_arr[$key] = "Missing Field";
            }
        }
        if(!empty($error_arr)) {
            return $error_arr;
        } 
    }
    
    
    function validate_cc_exp($month, $year){

        if ($year > date("Y")){
            return true;
        } elseif ( eregi_replace("^0","", $year) == eregi_replace("^0","", date("Y")) && eregi_replace("^0","", $month) >= eregi_replace("^0","", date("m"))) {
            return true;
        } else {
            return false;
        }
    }
    

    function validate_cc( $ccNum, $card_type ){
        $v_ccNum = false;

		$card_type_accepted_arr = $this->load_all_active();

        if ($card_type == "visa" || !$card_type) {

            // VISA
            if ( ereg("^4[0-9]{12}([0-9]{3})?$", $ccNum) ) {

                $v_ccNum = true;
                $c_type  = 'visa';
            }

        } else if ($card_type == "mc" || !$card_type) {
            // MC
            if ( ereg("^5[1-5][0-9]{14}$", $ccNum) )  {
                $v_ccNum = true;
                $c_type  = 'mc';
            }
        } else if ($card_type == "amex" || !$card_type) {
            // AMEX
            if ( ereg("^3[47][0-9]{13}$", $ccNum) )  {
                $v_ccNum = true;
                $c_type  = 'amex';
            }
        } else if ($card_type == "discover" || !$card_type) {
            // DISCOVER
            if ( ereg("^6011[0-9]{12}$", $ccNum) )  {
                $v_ccNum = true;
                $c_type  = 'discover';
            }
        } else if ($card_type == "delta" || !$card_type) {
            // DELTA ?
            if ( eregi ( "^4(1373[3-7]|462[0-9]{2}|5397[8-9]|"
                ."54313|5443[2-5]|54742|567(2[5-9]|3[0-9]|4[0-5])|"
                ."658[3-7][0-9]|659(0[1-9]|[1-4][0-9]|50)|844(09|10)|"
                ."909[6-7][0-9]|9218[1-2]|98824)[0-9]{10}$" ) ) {
                $v_ccNum = true;
                $c_type  = 'delta';
            }
        }else if ($card_type == "solo" || !$card_type) {
            // SOLO  ?
            if ( ereg("^6(3(34[5-9][0-9])|767[0-9]{2})[0-9]{10}([0-9]{2,3})?$") ) {
                $v_ccNum = true;
                $c_type  = 'solo';
            }
        }	else if ($card_type == "switch" || !$card_type) {
            // SWITCH  ?
            if ( ereg('^49(03(0[2-9]|3[5-9])|11(0[1-2]|7[4-9]|8[1-2])|36[0-9]{2})[0-9]{10}([0-9]{2,3})?$', $ccNum) ||
                ereg('^564182[0-9]{10}([0-9]{2,3})?$', $ccNum) ||
                ereg('^6(3(33[0-4][0-9])|759[0-9]{2})[0-9]{10}([0-9]{2,3})?$', $ccNum) )  {
                $v_ccNum = true;
                $c_type  = 'switch';
            }
        } else if ($card_type == "jcb" || !$card_type) {
            // JCB
            if(ereg("^(3[0-9]{4}|2131|1800)[0-9]{11}$", $ccNum) )  {
                $v_ccNum = true;
                $c_type  = 'jcb';
            }
        } else if ($card_type == "diners" || !$card_type) {
            // DINERS
            if ( ereg("^3(0[0-5]|[68][0-9])[0-9]{11}$", $ccNum) ) {
                $v_ccNum = true;
                $c_type  = 'diners';
            }
        } else if ($card_type == "carteblanche" || !$card_type) {
            // CARTEBLANCHE
            if ( ereg("^3(0[0-5]|[68][0-9])[0-9]{11}$", $ccNum) ) {
                $v_ccNum = true;
                $c_type  = 'carteblanche';
            }
        } else if ($card_type == "enroute" || !$card_type) {
            // ENROUTE
            if (( (substr($ccNum, 0, 4) == "2014" || substr($ccNum, 0, 4) == "2149") && (strlen($ccNum) == 15) )) {
                $v_ccNum = true;
                $c_type  = 'enroute';
            }
        }
        
        // validate accepted card type

	

        if ($card_type_accepted_arr->fields != false & $v_ccNum) {
			

            $v_ccNum = false;

            for($i=0; $i<count($card_type_accepted_arr); $i++)
                if($card_type_accepted_arr->fields['card_type_accepted_arr'] == $c_type) $v_ccNum = true;  
        }
    
        if ( $v_ccNum ){
                return TRUE;
        } else {
              	return FALSE;
        }


    } 
    

    function safe_number($ccNum){
        $char = 'x';
    
        $s_card_number = substr($ccNum, 0, 4);	
        $e_card_number = substr($ccNum, -4);
        
        $num_to_hide = strlen($ccNum) - 8;
    
    for($i = 0; $i < $num_to_hide; $i++){
        $pad .= $char;
    }
    
        $safe_num .= $s_card_number;
        $safe_num .= $pad;
        $safe_num .= $e_card_number;
    
    return $safe_num;
    }
    

    
    
    function charge_an($cc_number,$cc_expiry_date,$cc_amount,&$result) {
    
		$this->cc_number 		= $cc_number;
		$this->cc_expiry_date	= $cc_expiry_date;
		$this->cc_amount		= $cc_amount;
		$this->invocie_id		= $invoice_id;

        $fields = $this->prepare_fields();
		
	
		die;

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


        $result = $this->proc_result($resp);

    
        return $result;
    }
    

    function prepare_fields() {

        // Need to Load Customer Details

		

		

         /* proccess CC card */
        $authnet_values				= array
        (
        "x_ADC_Delim_Data"				=>"TRUE",
        "x_ADC_Relay_Response"		    =>"TRUE",
        "x_ADC_URL"						=>"FALSE",
        "x_Amount"						=>$this->cc_amount,
        "x_currency_code"				=>CURENCY_CODE,
        "x_Card_Num"					=>$this->cc_number,
        "x_card_code"					=>$cc_ccv,
        "x_Exp_Date"					=>$this->cc_expiry_date,
        "x_Login"						=>AN_LOGIN,
        "x_merchant_email"				=>SITE_EMAIL_ADMIN,
        "x_Method"						=>"CC",
        "x_Password"					=>AN_PASSWD,
        "x_Trans_ID"					=>"",
        "x_Type"						=>"AUTH_CAPTURE",
        "x_cust_id"						=>$cust_id,
        "x_first_name"					=>$first_name,
        "x_last_name"					=>$last_name,
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
        "x_invoice_num"					=>$this->invoice_id,
        "x_description"					=>$inv_msg,
        "x_Version"						=>"3.0",
        "x_Test_Request"				=>"TRUE"
        );
        

		print "<pre>";
		print_R($authnet_values);
		print "</pre>";

		die;

        $fields = "";
        foreach( $authnet_values as $key => $value ) $fields .= "$key=" . urlencode( $value ) . "&";
        
        
        return $fields;

    }


    function proc_result($result) {
         
        $result = str_replace("\"", "", $result);
        $result = explode(",", $result);
        
        /* return codes 
            1	Approved
            2 	Declined
            3	Error
        */ 


        switch ($result[0]) {




        }


    }




}
?>