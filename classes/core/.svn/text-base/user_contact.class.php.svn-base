<?php
require(CLASS_PATH."/getter/user_contact_getter.class.php");

/** 
 * Type:     Cite CMS Core Class<br>
 * Name:     contact<br>
 * Purpose:  For all user methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class user_contact extends user_contact_getter {

	var $this;

	/**
     * Class Constructor
     * @author Jaimie Garner jaimie@citesoftware.com
	 * @access Public
 	 * @version 1.0
	*/
	function user_contact() {
	
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("user_contact");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
			
		}
	
	}

	
	// Public Methods
	//
	
	/** createNewContact
	 *
	 * Type:     Public Method<br>
	 * Name:     createNewContact<br>
	 * Purpose:  Creates A new user contact<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param  $_REQUEST Form Vars
	 *
	 * @return String  userID String | The contactID
	 * @access Public
	*/
	function createNewContact($user_id,$contact_type,$contact_value) {
		global $db;	
		global $core;
		
		$q = "INSERT INTO user_contact SET 
				user_id				= " . $db->qstr($user_id) . ",
				contact_type		= " . $db->qstr($contact_type) . ",
				contact_value		= " . $db->qstr($contact_value) . ",
				contact_create_date	= " . time();

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		

		$contactID = $db->Insert_Id;

		
		return $contactID;
	
	}

    function clear_all($user_id){
        global $error;
        global $db;

        $q = "DELETE FROM user_contact WHERE user_id = " . $db->qstr($user_id);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
        
    
    }

	

	/** loadByUserID
	 *
	 * Type:     Public Method<br>
	 * Name:     loadByUserID<br>
	 * Purpose:  Creates A new user contact<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @Param String $user_id | The user ID
	 * @access Public
	 * @return Array  $contact String | The Contacts
	 *
	*/
	function loadByUserID($userID){
		global $db;
		global $error;
		
		$q = "SELECT * FROM user_contact WHERE user_id = " . $db->qstr( $userID );
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
	
		$contact = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {

			$contact[$counter] = new user_contact();
			
			$contact[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
					
		
		return $contact;
	
	}

	/** loadBYContactID
	 *
	 * Type:     Public Method<br>
	 * Name:     loadBYContactID<br>
	 * Purpose:  Loads A contact By ID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $contactID  The contact ID
	 * @access Public
	 * @return Object
	 * @version 1.0
	*/
	function loadBYContactID($contactID){
	
		global $db;
		global $error;
		
		$q = "SELECT * FROM user_contact WHERE contact_id = " . $db->qstr( $contactID );
	
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];
	
	}


	/** editContact
	 *
	 * Type:     Public Method<br>
	 * Name:     editContact<br>getUserID()
	 * Purpose:  Edits contact By ID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $_REQUEST  Form Vars
	 * @access Public
	 * @return $contact_id
	 * @version 1.0
	*/
	function update_user_contact($_REQUEST){
	
		global $core;
		
		if($core->isAdmin()) {
			$this->fields['user_id']		= $_REQUEST['user_id'];
		} else {
			$this->fields['user_id']		= $_SESSION['SESSION_USER_ID'];
		}
		
	
		$this->fields['contact_id']		= $_REQUEST['user_contact_id'];
		$this->fields['account_id']		= $_REQUEST['account_id'];
		$this->fields['contact_type']	= $_REQUEST['contact_type'];
		$this->fields['contact_value']	= $_REQUEST['contact_value'];
		
		$this->_update();
		
		$_SESSION['CLEAR_CACHE'] = true;
		
		return $this->fields['contact_id'];
	}


	/** deleteContact
	 *
	 * Type:     Public Method<br>
	 * Name:     deleteContact<br>
	 * Purpose:  Deletes contact By ID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $_REQUEST  Form Vars
	 * @access Public
	 * @return $contact_id
	 * @version 1.0
	*/
	function deleteContact($_REQUEST) {
		
		global $core;
		
		if($core->isAdmin()) {
			$this->fields['user_id']		= $_REQUEST['user_id'];
		} else {
			$this->fields['user_id']		= $_SESSION['SESSION_USER_ID'];
		}
		
		
		$this->fields['contact_id']	= $_REQUEST['contact_id'];
		
		$this->_delete();
	
		$_SESSION['CLEAR_CACHE'] = true;
		
		return true;
	
	}


    function load_by_user_type($user_id, $type) {
        global $db;
        global $error;

        $q = "SELECT * FROM user_contact WHERE user_id = " . $db->qstr($user_id) . " AND contact_type = " . $db->qstr($type);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMSg(),$q);
		}

        $tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];


    }

	// Private Methods
	//
	
	/** _save
	 *
	 * Type:     Private Method<br>
	 * Name:     _save<br>
	 * Purpose:  Saves an record<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return $contactID | The insert Row ID 
	 * @version 1.0
	*/
	function _save($this) {
		global $db;
		global $error;
		
		
		$q = "INSERT INTO user_contact SET
				user_id					= " . $db->qstr( $this->fields['user_id']				) . ",
				contact_type			= " . $db->qstr( $this->fields['contact_type']			) . ",
				contact_value			= " . $db->qstr( $this->fields['contact_value']		) . ",
				contact_create_date	= " . $db->qstr( $this->fields['contact_create_date']	);
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMSg(),$q);
		}
		
		$contactID = $db->Insert_ID();
		
		return $contactID;
	}


	/** _save
	 *
	 * Type:     Private Method<br>
	 * Name:     _update<br>
	 * Purpose:  Updates an record<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return true
	 * @version 1.0
	*/
	function _update() {
		
		global $db;
		global $error;
		
		$q = "UPDATE user_contact SET
					contact_type		= " . $db->qstr( $this->fields['contact_type']			) . ",
				   contact_value		= " . $db->qstr( $this->fields['contact_value']		) . "
				   WHERE contact_id	= " . $db->qstr( $this->fields['contact_id']) ." AND user_id = " . $db->qstr( $this->fields['user_id'] );
				   
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMSg(),$q);
		}
		
		
		return true;
	
	}
	
	/** _delete
	 *
	 * Type:     Private Method<br>
	 * Name:     _delete<br>
	 * Purpose:  Deletes a record<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return true
	 * @version 1.0
	*/
	function _delete() {
		
		global $db;
		global $error;
		
		$q = "DELETE FROM user_contact 
				WHERE contact_id	= " . $db->qstr( $this->fields['contact_id']) ." 
				AND user_id = " . $db->qstr( $this->fields['user_id'] );
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMSg(),$q);
		}
		
		
		return true;
	
	}
	
	
}

?>