<?php
require(CLASS_PATH."/getter/user_address_getter.class.php");

/** 
 * Type:     Cite CMS Core Class<br>
 * Name:    address<br>
 * Purpose:  For all address methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class user_address extends user_address_getter {

	var $this;

	/**
     * Class Constructor
     * @author Jaimie Garner jaimie@citesoftware.com
	 * @access Public
 	 * @version 1.0
	*/
	function user_address() {
	
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("user_address");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
			
		}
	
	}
	
	function load_by_address_id($address_id){
		global $db;
		global $error;
		
		$q = "SELECT * FROM user_address WHERE address_id = " . $db->qstr($address_id);
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError( $db->ErrorMsg, $q);
		}
		
		$tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];
	}


	/** loadByAddressType
	 *
	 * Type:     Public Function<br>
	 * Name:     loadByAddressType<br>
	 * Purpose:  Loads a User or Account Address By Address type<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @Param type | String Address Type Options: <i>Home, Business, Billing, Shipping</i>
	 * @Param accountID | The Account ID
	 * @Param userID | The User ID
	 * @return Address Object
	 *
	*/
	function loadByAddressType($type="Home",$userID) {
	
		global $db;
		global $error;
		
		$q = "SELECT * FROM user_address WHERE user_id 		= " . $db->qstr($userID) . " AND address_type 	= " . $db->qstr($type);
		
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError( $db->ErrorMsg, $q);
		}
		
		$tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];
		
	
	}
	
	/**  loadAddressByUserID
	 *
	 * Type:      Cite CMS Public Methods<br>
	 * Name:      loadAddressByUserID<br>
	 * Purpose:   Loads Users Address By User ID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $userID | The Users ID
	 * @access Public
	 * @return Array  The Users Address Details
	 * @version 1.0
	*/
	function loadAddressByUserID($userID) {
		global $db;
		global $error;
		
		$q = "SELECT * FROM user_address WHERE user_id = " . $db->qstr( $userID );
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$address = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();



		while($counter < count($tempArray)) {

			$address[$counter] = new user_address();
			
			$address[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
					
		
		return $address;

	}

    function load_company_address($user_id){
        global $db;
        global $error;

        $q = "SELECT company_address_to_user.*, company_address.*
                FROM company_address_to_user
                LEFT JOIN company_address ON company_address_to_user.company_address_id = company_address.company_address_id
                WHERE company_address_to_user.user_id = " . $db->qstr($user_id);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}


        $tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];     

    }

	
	
	/** createNewAddress
	 *
	 * Type:     Public Method<br>
	 * Name:     createNewAddress<br>
	 * Purpose:  Creates an Address<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Public
	 * @param $address_type String | Type Of Address  Options: <i>Home, Business, Billing, Shipping</i>
	 * @version 1.0
	 * @return addressID String | The address ID 
	 *
	*/
	function createNewAddress($_REQUEST){
		
		global $core;
		
		if($core->isAdmin()) {
			$this->fields['user_id']		= $_REQUEST['user_id'];
		} else {
			if(!empty($_SESSION['SESSION_USER_ID'])) {
				$this->fields['user_id']		= $_SESSION['SESSION_USER_ID'];
			} else {
				$this->fields['user_id']	= $_REQUEST['user_id'];
			}
			
		}
		
		
		$this->fields['address_type']				= $_REQUEST['address_type'];
		$this->fields['address_street']			= $_REQUEST['address_street'];
		$this->fields['address_street_2']		= $_REQUEST['address_street_2'];
		$this->fields['address_city']				= $_REQUEST['address_city'];
		$this->fields['address_state']			= $_REQUEST['address_state'];
		$this->fields['address_postal_code']	= $_REQUEST['address_postal_code'];
		$this->fields['address_country']		= $_REQUEST['address_country'];
		
		$addressID = $this->_save();
		
		$_SESSION['CLEAR_CACHE'] = true;
		
		return $addressID;
		
	}

    function new_address($address_type,$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_date_create) {
        global $db;
        global $error;

        $q = "INSERT INTO user_address SET
                address_type         = " . $db->qstr($address_type) . ",
                user_id              = " . $db->qstr($user_id) . ",
                address_street       = " . $db->qstr($address_street) . ",
                address_street_2     = " . $db->qstr($address_street_2) . ",
                address_city         = " . $db->qstr($address_city) . ",
                address_state        = " . $db->qstr($address_state) . ",
                address_postal_code  = " . $db->qstr($address_postal_code) . ",
                address_country      = " . $db->qstr($address_country) . ",
                address_date_create  = " . $db->qstr($address_date_create);

       if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	   }

    }



	
	/** editAddress
	 *
	 * Type:     Public Method<br>
	 * Name:     editAddress<br>
	 * Purpose:  Edits an Address<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Public
	 * @param $_REQUEST ARRAY 
	 * @version 1.0
	 * @return addressID String | The address ID 
	 *
	*/
	function editAddress($address_type,$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_id) {
		global $error;
		global $db;
		
	
		$q = "UPDATE user_address SET
					address_type		= " . $db->qstr($address_type) . ",  
					user_id				= " . $db->qstr($user_id) . ", 
					address_street		= " . $db->qstr($address_street) . ", 
					address_street_2	= " . $db->qstr($address_street_2) . ", 
					address_city		= " . $db->qstr($address_city) . ", 
					address_state		= " . $db->qstr($address_state) . ", 
					address_postal_code	= " . $db->qstr($address_postal_code) . ", 
					address_country		= " . $db->qstr($address_country) . "
					WHERE address_id 	= " . $db->qstr($address_id);
					
		
			if(!$rs = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
			}

	}
	
	
	function delete_user_address($_REQUEST) {
		
		global $core;
		
		if($core->isAdmin()) {
			$this->fields['user_id']		= $_REQUEST['user_id'];
		} else {
			$this->fields['user_id']		= $_SESSION['SESSION_USER_ID'];
		}
		
		$this->fields['address_id']		= $_REQUEST['address_id'];
		
		$addressID = $this->_delete();
		
		$_SESSION['CLEAR_CACHE'] = true;
		
		return true;
	}
	
	
	// Private Functions
	
	/** _save
	 *
	 * Type:     Private Method<br>
	 * Name:     _save<br>
	 * Purpose:  Inserts  an Address<br>
	 * 
	 * @access Private
	 * @author jaimie@citesoftware.com
	 * @version 1.0
	 * @return insertID String | The insert Row ID 
	 *
	*/
	function _save() {
	
		global $db;
		global $error;
		
		
			$q = "INSERT INTO user_address SET
					address_type				= " . $db->qstr( $this->fields['address_type']			) . ",  
					user_id						= " . $db->qstr( $this->fields['user_id']				) . ", 
					address_street				= " . $db->qstr( $this->fields['address_street']		) . ", 
					address_street_2			= " . $db->qstr( $this->fields['address_street_2']		) . ", 
					address_city				= " . $db->qstr( $this->fields['address_city']			) . ", 
					address_state				= " . $db->qstr( $this->fields['address_state']		) . ", 
					address_postal_code		= " . $db->qstr( $this->fields['address_postal_code']	) . ", 
					address_country			= " . $db->qstr( $this->fields['address_country']		) . ", 
					address_date_create		= " . $db->qstr( time()									);
					 
			if(!$rs = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
			}
			
			$this->fields['address_id'] = $db->Insert_ID();
			
			$_SESSION['CLEAR_CACHE'] = true;
			
			return $this->fields['address_id'];			
				
	}
		
	
	/** _update
	 *
	 * Type:     Private Method<br>
	 * Name:     _update<br>
	 * Purpose:  Updates an Address<br>
	 * 
	 * @access Private
	 * @author jaimie@citesoftware.com
	 * @version 1.0
	 * @return insertID String | The insert Row ID 
	 *
	*/
	function _update(){
		
		global $db;
		global $error;
		
		$q = "UPDATE user_address SET
					address_type				= " . $db->qstr( $this->fields['address_type']			) . ",  
					user_id						= " . $db->qstr( $this->fields['user_id']				) . ", 
					address_street				= " . $db->qstr( $this->fields['address_street']		) . ", 
					address_street_2			= " . $db->qstr( $this->fields['address_street_2']		) . ", 
					address_city				= " . $db->qstr( $this->fields['address_city']			) . ", 
					address_state				= " . $db->qstr( $this->fields['address_state']		) . ", 
					address_postal_code		= " . $db->qstr( $this->fields['address_postal_code']	) . ", 
					address_country			= " . $db->qstr( $this->fields['address_country']		) . "
					WHERE address_id 			= " . $db->qstr( $this->fields['address_id']					);
					
			if(!$rs = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
			}
			
			
			$_SESSION['CLEAR_CACHE'] = true;
			
			return $this->fields["address_id"];	
	}
	
	
	/** _delete
	 *
	 * Type:     Private Method<br>
	 * Name:     _delete<br>
	 * Purpose:  Deletes an Address<br>
	 * 
	 * @access Private
	 * @author jaimie@citesoftware.com
	 * @version 1.0
	 * @return insertID String | The insert Row ID 
	 *
	*/
	function _delete(){
		global $db;
		global $error;
	
		$q = "DELETE FROM user_address 
		WHERE address_id = " . $db->qstr( $this->fields['address_id']) . " 
				AND user_id = " . $db->qstr($this->fields['user_id']);
		
		if(!$rs = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
		}
		
		$_SESSION['CLEAR_CACHE'] = true;
		
		return true;
		
	}
	
}


?>