<?php
/** 
 * Type:     Cite CMS Core Class<br>
 * Name:     contactGetter<br>
 * Purpose:  getter methods for contact<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/

class user_contact_getter {

	/** 
	 * Type:     Public Getter<br>
	 * Name:    getContactID<br>
	 * Purpose:  Returns getContactID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @return String user_id
	 *
	*/
	function getContactID() {
		return $this->fields['contact_id']; 	
	}

	/** getUserID
	 * Type:     Public Getter<br>
	 * Name:     getUserID<br>
	 * Purpose:  Returns User ID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @return String user_id
	 *
	*/
	function getUserID() {
		return $this->fields['user_id'];
	}
	
	
	/** getAccountID
	 * Type:     Public Getter<br>
	 * Name:     getAccountID<br>
	 * Purpose:  Returns Account ID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @return String account_id
	 *
	*/
	function getAccountID() {
		return $this->fields['account_id'];
	}
	
	
	/** getContactType
	 * Type:     Public Getter<br>
	 * Name:     getContactType<br>
	 * Purpose:  Returns Contact Type<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @return String  contact_type
	 *
	*/
	function getContactType() {
		return $this->fields['contact_type'];
	}
	
	/** getContactValue
	 * Type:     Public Getter<br>
	 * Name:     getContactValue<br>
	 * Purpose:  Returns The Contact Value<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @return String contact_value
	 *
	*/
	function getContactValue() {
		return $this->fields['contact_value'];
	}
	
	/** getContactCreateDate
	 * Type:     Public Getter<br>
	 * Name:     getContactCreateDate<br>
	 * Purpose:  Returns Createtion Date<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @return String contact_create_date
	 *
	*/
	function getContactCreateDate() {
		return $this->fields['contact_create_date'];
	}
	
	/** getLastModified
	 * Type:     Public Getter<br>
	 * Name:     getLastModified<br>
	 * Purpose:  Returns LAst Modified time<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @return String last_modified
	 *
	*/
	function getLastModified() {
		return $this->fields['last_modified'];
	}


	/** getUserHomePhone
	 * Type:     Public Getter<br>
	 * Name:     getUserHomePhone<br>
	 * Purpose:  Returns The USers Phone Number<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $userID The Users ID
	 * @return String Home Phone
	 *
	*/	
	function getUserHomePhone($userID) {
		global $db;
		global $error;
		
		$q = "SELECT contact_value FROM contact WHERE contact_type='Home' and user_id = " . $db->qstr( $userID );
		
		if(!$rs = $db->Execute($q) ) {
			$error->dbError( $db->ErrorMsg(), $q );
		}
		
		$this->fields['contact_value'] = $rs->fields['contact_value'];
		
		return $this->fields['contact_value'];
	

	}
	
	
}

?>