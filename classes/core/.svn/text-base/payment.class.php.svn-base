<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     payment.class.php<br>
 * Purpose:  For all payment methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require_once(CLASS_PATH."/getter/payment_getter.class.php");

class payment extends payment_getter {
    
    function payment(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("invoice");
	if(!empty($translate_array)) {
		foreach($translate_array as $translate){
			$tans = "translate_".strtolower($translate['name']);
			$val = $translate['content'];
			$smarty->assign($tans,$val);
		}
	}
}

    function validate_check_number($check_number) {

        if( preg_match('!^\d+$!', $check_number) ) {
            return true;
        } else {
            return false;
        }      
        
    }


    function is_currency($payment_amount) {

        if($payment_amount <= 0){
            return false;
        }


        if(preg_match('/^\d+(\.\d{1,2})?$/', $payment_amount) ) {
            return true;
        } else {
            return false;
        }

        

    }

    /**  
	 *
	 * Type:     Private Function<br>
	 * Name:      encrypt<br>
	 * Purpose:  Encrypt a string<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @package CiteCMS
	 * @access Private
	 * @param String $strString The string to encrypt
	 * @param String $strKey The key the longer the better
	 * @return String $enString The new encrypted String
	 * @version 1.0
	*/
	function encrypt($encrypt) {
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);

        $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, STRKEY, $encrypt, MCRYPT_MODE_ECB, $iv);

        $encode = base64_encode($passcrypt);

        return $encode;
    } 


	/** 
	 *
	 * Type:     Private Function<br>
	 * Name:      encrypt<br>
	 * Purpose:  Encrypt a string<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @package CiteCMS
	 * @access Private
	 * @param String $strString The string to encrypt
	 * @param String $strKey The key that was used to encrypt
	 * @return String $enString The new encrypted String
	 * @uses hex2bin
	 * @version 1.0
	*/
	function decrypt($decrypt) {
  
        $decoded = base64_decode($decrypt);

        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);

        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, STRKEY, $decoded, MCRYPT_MODE_ECB, $iv);

        

        return trim($decrypted);
    } 

    function safe_cc_num($ccNum) {
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


    function load_payment_by_invoice($invoice_id,$payment_type) {
        global $db;
        global $error;

        switch ($payment_type) {

            case "1": // Credit Card
               $q = "SELECT * FROM cc_payment WHERE invoice_id = " . $db->qstr($invoice_id) . " ORDER BY cc_payment_id DESC";

                if(!$rs = $db->Execute($q)) {
                    $error->dbError($db->ErrorMsg(), $q);
                }
            
            
                $tempArray = $rs->GetArray();
            
                $this->fields = $tempArray[0];
                
            break;


            case "2": // Check Payment

                $q = "SELECT * FROM check_payment WHERE invoice_id = " . $db->qstr($invoice_id);

                if(!$rs = $db->Execute($q)) {
                    $error->dbError($db->ErrorMsg(), $q);
                }
            
            
                $tempArray = $rs->GetArray();
            
                $this->fields = $tempArray[0];
        
            break;


        }


    }


}
?>