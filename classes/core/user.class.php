<?php
require(CLASS_PATH."/getter/user_getter.class.php");

/** 
 * Type:     Cite CMS Core Class<br>
 * Name:    user<br>
 * Purpose:  For all user methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class user extends user_getter {

	var $this;

	/**
     * Class Constructor
     * @author Jaimie Garner jaimie@citesoftware.com
	 * @access Public
 	 * @version 1.0
	*/
	function user() {
	
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("user");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
		}
	
	
	
	}
	
	// Public Methods
	
	/**  loadUserByID
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:      loadUserByID<br>
	 * Purpose:  Loads A single Users Details<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $userID | The Users ID
	 * @access Public
	 * @return Array  The Users Details
	 * @version 1.0
	*/
	function loadUserByID($userID) {
		global $db;
		global $error;

		$q = "SELECT user.*, activation_code.activation_code_text
				FROM user 
				LEFT JOIN activation_code ON user.user_id = activation_code.user_id
				WHERE user.user_id = " . $db->qstr( $userID );

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];
	
	}
	
	
	function load_user_by_workorder($workorder_id) {
	
		global $db;
		global $error;
		
		$q = "SELECT user_to_workorder.*,user.*
				FROM user_to_workorder, user
				WHERE workorder_id = " . $db->qstr($workorder_id) ."
				AND user_to_workorder.user_id = user.user_id";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];
	}
	
	/**  loadAllUsers
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     loadAllUsers()<br>
	 * Purpose:  Loads All users paginated<br>
	 *
	 * Example: Call from a php page
	 * SmartyPaginate::connect(); 												// Conect the SmartyPaginate<br>
	 * SmartyPaginate::setLimit(25); 											// The result Limit<br>
	 * SmartyPaginate::setUrl('/?page=user:adminViewAllUsers');	// Set The url for next and Prev<br>	
	 * $userArray = $user->loadAllUsers();									// Get the Array of users paginated<br>
	 * $smarty->assign('userArray', $userArray); 							// Assign the userArray to smarty<br>
	 * SmartyPaginate::assign($smarty);										// Assign paginate<br>
	 * $smarty->display('user/adminViewAllUsers.tpl');					// Dislay the page<br>
	 *
	 * @author jaimie@citesoftware.com
	 * @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
	 * @param  SmartyPaginate::getLimit() Smarty Paginate Object
	 * @access Public
	 * @return $user Array  The paginated List of Users
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object, $smarty Smarty Object
	*/
	function loadAllUsers($start=0,$limit=50,&$total) {
		
		global $db;
		global $error;	
	
		$q = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM user 
				LIMIT $start, $limit";
	
		

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$user = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {

			$user[$counter] = new user();
			
			$user[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
        
        
		// now we get the total number of records from the table
		$q = "SELECT FOUND_ROWS()";
        
      if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
        
		$total = $rs->fields['FOUND_ROWS()'];

		return $user;
		
	}
	
	
	function search_user($field,$sort,$and,$start=0, $limit=50, &$total) {	
		global $db;
		global $error;	
		
		
			
		$q = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM user
				WHERE 1 = 1
				$and
				ORDER BY $field $sort LIMIT $start, $limit";

		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$user = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {

			$user[$counter] = new user();
			
			$user[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}		
		
		
		$q = "SELECT FOUND_ROWS()";
        
      if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$total = $rs->fields['FOUND_ROWS()'];
		
		return $user;
	
	}
	
	function load_active_employees(){
			global $db;
			global $error;
			
			$q = "SELECT * FROM user 
				WHERE user_type_id = " . $db->qstr(EMPLOYEE_TYPE_ID) . "
				AND user_status = 'Active'";
				
			if(!$rs = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
			}
			
			$user = array();
			
			$counter = 0;
	
			$tempArray = $rs->GetArray();
			
			
			while($counter < count($tempArray)) {
	
				$user[$counter] = new user();
				
				$user[$counter]->fields = $tempArray[$counter];
				
				$counter++;
			}		
				
			return $user;	
	}

	function load_employees($field,$sort,$and,$start=0, $limit=50, &$total) {	
		global $db;
		global $error;	
		
		
			
		$q = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM user
				WHERE 1 = 1
				AND user_type_id = " . $db->qstr(EMPLOYEE_TYPE_ID) . "
				$and
				ORDER BY $field $sort";

        if($limit > 0) {
            $q .= " LIMIT $start, $limit";
        }


            

				

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$user = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {

			$user[$counter] = new user();
			
			$user[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}		
		
		
		$q = "SELECT FOUND_ROWS()";
        
      if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$total = $rs->fields['FOUND_ROWS()'];
		
		return $user;
	
	}
	/**
	 *
	 * Type:     Public Function<br>
	 * Name:     load_by_company_id<br>
	 * Purpose:  Loads All Users by company ID<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $company_id  The company ID the user belongs to
	 * @access Public
	 * @return Array Array of user objects
	 * @version 1.0
	*/
	function load_by_company_id($company_id,$field='user_id',$sort='ASC',$start=0,$limit=5,&$total) {
		global $db;
		global $error;
		
		$q = "SELECT SQL_CALC_FOUND_ROWS user_to_company.*, user.* 
				FROM user_to_company, user
				WHERE user_to_company.company_id = " . $db->qstr ($company_id) . "
				AND user_to_company.user_id = user.user_id
				ORDER BY user.$field $sort";

		if($limit > 0 )	{
			$q .=" LIMIT $start,$limit";
		}
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$user_array = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {

			$user_array[$counter] = new user();
			
			$user_array[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
	
		$q = "SELECT FOUND_ROWS()";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$total = $rs->fields['FOUND_ROWS()'];


		return $user_array;
	}

	/**
	 *
	 * Type:     Public Function<br>
	 * Name:     load_by_type_id<br>
	 * Purpose:  Loads All Users by user type<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $user_type_id  The user Type ID
	 * @access Public
	 * @return Array Array of user objects
	 * @version 1.0
	*/
	function load_by_type_id($user_type_id) {
		global $db;
		global $error;
		
		$q = "SELECT * FROM user WHERE user_type_id = " . $db->qstr( $user_type_id);
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$user_array = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
		
		
		while($counter < count($tempArray)) {

			$user_array[$counter] = new user();
			
			$user_array[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
	
		return $user_array;
	
	
	}

	function add_user($user_type_id,$user_admin,$user_status,$user_username,$user_password,$user_first_name,$user_last_name,$user_email,$user_create_date,$user_activation_date){
		global $db;
		global $error;

		$q = "INSERT INTO user SET 
				user_type_id			= " . $db->qstr($user_type_id) . ",
				user_admin				= " . $db->qstr($user_admin) . ",			
				user_status				= " . $db->qstr($user_status) . ",
				user_password			= " . $db->qstr(md5($user_password)) . ",
				user_first_name		    = " . $db->qstr($user_first_name) . ",
				user_last_name			= " . $db->qstr($user_last_name) . ",
				user_email				= " . $db->qstr($user_email) . ",
				user_create_date		= " . $db->qstr($user_create_date) . ",
				user_activation_date	= " . $db->qstr($user_activation_date);


		if( !$rs = $db->Execute($q) ) {
				$error->dbError( $db->ErrorMsg(), $q );
				exit;
			}
	
		return $db->Insert_ID();			

	}
	
	
	

	/**
	 *
	 * Type:      Public Function<br>
	 * Name:      generateNewActivationCode<br>
	 * Purpose:   Creates a new User Activation Code<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * 
	 * @access Public
	 * @return boolen True / false
	 * @version 1.0
	*/
	function generateNewActivationCode(){
	
		$this->_deleteActivationCode();
	
		$this->fields['activation_code_text'] = $this->createVerificationCode($length = 24);
		
		$this->fields['activation_code_type'] = "Activation";
		
		// Save Activation Code
		if(!$this->_saveVerificationCode()) {
			return false;				
		}
		
		// Mail Object
		$mail = new mail();
		
		// Mail User their Activation Code
		$mail->sendActivationEmail($this);
		
		
		// Mail the Admin that new user has signed up
		$adminMsg 		= "New Activation Code Created: " . SITE_NAME ."\n User ID " . $this->fields['user_id'];
		
		$adminSubject 	= "New Activation Code Created: " . SITE_NAME;
		
		$mail->mailAdmin($adminMsg,$adminSubject);
		
		return true;
	
	}



	/**  createVerificationCode
	 *
	 * Type:     Public Function<br>
	 * Name:      createVerificationCode<br>
	 * Purpose:  Creates Random activation code or password retrivial code<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $length  The length of the code defaults to 24
	 * @access Public
	 * @return String  The newly created code.
	 * @version 1.0
	*/
	function createVerificationCode($length = 24) {
	
		$activationCode = "";

		$possible = "0123456789bcdfghjkmnpqrstvwxyz";

		// set up a counter
		$i = 0;

		// add random characters to $activationCode until $length is reached
		while ($i < $length) {

			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

			// we don't want this character if it's already in the password
			if (!strstr($activationCode, $char)) {
				$activationCode .= $char;
				$i++;
			}
		
		}

		// done!
		return $activationCode;
		
	}



	/** activateUser
	 *
	 * Type:     Public Function<br>
	 * Name:     activateUser<br>
	 * Purpose:  Activates A new users account<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $activationCode  The activation Code to activate
	 * @access Public
	 * @return Boolen  False if no user ID found, True if the user was activated
	 * @version 1.0
	*/
	function activateUser($activationCode){
		global $db;
		global $error;
		
		// Get User ID
		$q = "SELECT user_id FROM activation_code WHERE activation_code_text = " . $db->qstr( $activationCode );
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		
		if($rs->fields['user_id'] == "") {
		
			return false;

			
		} else {
				
			$q = "UPDATE user SET user_status = 'Active', user_activation_date = " . $db->qstr( time() ) ." WHERE user_id = " . $db->qstr($rs->fields['user_id'] );
			
			if(!$rs = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
			}
				
			$_SESSION['CLEAR_CACHE'] = true;
				
			return true;
		}
		
	}

	
	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     update_user<br>
	 * Purpose:  Updates A user<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $userID  The username to test
	 * @access Public
	 * @return boolean  True / False 
	 * @version 1.0
	*/
	function update_user($user_id,$user_first_name,$user_last_name,$user_type_id,$user_admin,$user_email){
	
		global $db;
		global $error;
		
		$q = "UPDATE user SET 
					user_first_name 	= " . $db->qstr($user_first_name) .",
					user_last_name		= " . $db->qstr($user_last_name) .",
					user_type_id		= " . $db->qstr($user_type_id) .",
					user_admin			= " . $db->qstr($user_admin) .",
					user_email			= " . $db->qstr($user_email) ."
				WHERE user_id 			= " . $db->qstr($user_id);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		
		
	}
	
	function reset_password($user_id,$user_password) {
		global $db;
		global $error;
		
		$q = "UPDATE user set
				user_password		= " . $db->qstr($user_password) . "
				WHERE user_id 		= " . $db->qstr($user_id);
			
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
	}
	
	
	function admin_update_user($user_id,$user_first_name,$user_last_name,$user_username,$user_email,$user_type_id,$user_admin) {
	
		global $db;
		global $error;
		
		$q = "UPDATE user SET
					user_type_id			= " . $db->qstr($user_type_id) .",
					user_admin				= " . $db->qstr($user_admin) .",
					user_username			= " . $db->qstr($user_username) .",
					user_first_name		= " . $db->qstr($user_first_name) .",
					user_last_name			= " . $db->qstr($user_last_name) .",
					user_email				= " . $db->qstr($user_email) ."
			WHERE user_id					= " . $db->qstr($user_id);
			
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$_SESSION['CLEAR_CACHE'] = true;
		
		return true;
	
	}
	
	/** deleteUser
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     deleteUser<br>
	 * Purpose:  Deletes A user<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $userID  The username to test
	 * @access Public
	 * @return boolean  True / False 
	 * @version 1.0
	*/
	function deleteUser($userID) {
		global $db;
		global $error;
		global $core;
		
		$core->verifyAdmin();
		
		
		$this->fields['user_id'] = $userID;
		
		if(!$this->_delete()) {
			return false;
		} else {
			return true;
		}		
	
	}
	
	function suspend_user($user_id,$suspension_reason) {
		global $db;
		global $error;
		
		$q = "UPDATE user SET user_status = 'Suspended' WHERE user_id = " . $db->qstr($user_id);
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}	
		
		$q = "INSERT INTO user_to_suspension SET
				user_id						= " . $db->qstr($user_id) . ",
				user_to_suspension_reaseon	= " . $db->qstr($suspension_reason) . ",
				user_to_suspension_by		= " . $db->qstr($_SESSION['SESSION_USER_ID']) . ",
				user_to_suspension_date		= " . $db->qstr(time());
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		
	}
	
	function load_suspension($user_id) {
		global $db;
		global $error;
		
		$q = "SELECT * FROM user_to_suspension WHERE user_id = " . $db->qstr($user_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		$tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];
	}
	
	function unsuspend($user_id) {
		global $db;
		global $error;
		
		$q = "UPDATE user SET user_status = 'Active' WHERE user_id = " . $db->qstr($user_id);
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}	
	}
	// Validation Rules & error control
	
	/** validateUsername
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     validateUsername<br>
	 * Purpose:  Tests if a username as already been used<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $user_username  The username to test
	 * @access Public
	 * @return boolean  True / False 
	 * @version 1.0
	*/
	function validateUsername($user_username) {
		global $db;
		global $error;
		
		
		$q = "SELECT count(user_id) AS count FROM user WHERE user_username = " . $db->qstr( $user_username);

		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		if($rs->fields['count'] != 0 ) {
			return true;
			
		} else {
			return false;
		}		
	
	}


	/** validateEmail
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     validateEmail<br>
	 * Purpose:  Tests if an email as already been used. This method is used with smartyValidate::emailExists<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $user_email | The email  to test
	 * @access Public
	 * @return boolean | True / False 
	 * @version 1.0
	*/
	function validateEmail($user_email) {
		global $db;
		global $error;
		
		$q = "SELECT count(user_id) AS count FROM user WHERE user_email = " . $db->qstr( $user_email);
		
		
		if(!$rs = $db->Execute($q)) {
			print $error->dbError($db->ErrorMsg(), $q);
			die;
		}
		
		if($rs->fields['count'] != 0 ) {
			return false;	
		} else {
			return true;
		}		
	
	
	}
	
	
	/** validateActivationCode
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     validateActivationCode<br>
	 * Purpose:  Test if an activation code is valid. This method is used with smartyValidate::validActivationCode<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $code  The activation code  to test
	 * @access Public
	 * @return boolean  True / False 
	 * @version 1.0
	*/
	function validateActivationCode($code){
		global $db;
		global $error;
		
		$expire_date = mktime(0+VERIFICATION_CODE_EXPIRE,0,0,date("m"),date("d"),date("Y"));
		
		$q = "SELECT count(activation_code_id) AS count 
				FROM activation_code 
				WHERE activation_code_text = " . $db->qstr( $code ) ." 
				AND activation_code_expire='0'" ;
		
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		if($rs->fields['count'] == 0 ) {
			return false;	
		} else {
			return true;
		}
	
	}
	
	function load_reset_code($code) {
		global $db;
		global $error;
		
		$q = "SELECT * FROM activation_code WHERE activation_code_text = " . $db->qstr($code) . " AND activation_code_type = 'Password'";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		$tempArray = $rs->GetArray();
			
		$this->fields = $tempArray[0];
	}
	
	function save_password_reset($user_id,$code,$expire_date){
		global $db;
		global $error;
		
		
		$q = "INSERT INTO activation_code SET
				user_id					= " . $db->qstr($user_id) . ",
				activation_code_text	= " . $db->qstr($code) . ",
				activation_code_type	= 'Password',
				activation_code_create	= " . $db->qstr(time()) . ",
				activation_code_expire	= " . $db->qstr($expire_date);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	}
	
	function system_to_user($system_id) {
	
		global $db;
		global $error;
		
		$q = "SELECT user_to_system.*, user.*
				FROM user_to_system
				LEFT JOIN user ON (user_to_system.user_id = user.user_id) 
				WHERE user_to_system.system_id = " . $db->qstr($system_id);
				
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];
	}

	

	function save_permisions($user_id,$permissions){
		global $db;
		global $error;

		$q = "UPDATE user 
			SET user_perms = " . $db->qstr($permissions) . "
			WHERE user_id = " . $db->qstr($user_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

	}
	
	function load_by_email($email){
		global $db;
		global $error;
		
		$q = "SELECT * FROM user WHERE user_email = " . $db->qstr($email);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];
		
	}
	
	function save_employee($user_perms,$user_password,$user_first_name,$user_last_name,$user_email) {
		global $db;
		global $error;
		
		$q = "INSERT INTO user SET
			user_type_id			= '1',
			user_admin				= '1',
			user_perms				= " . $db->qstr($user_perms) . ",
			user_status				= 'Active',
			user_password			= " . $db->qstr(md5($user_password)) . ",
			user_first_name			= " . $db->qstr($user_first_name) . ",
			user_last_name			= " . $db->qstr($user_last_name) . ",
			user_email				= " . $db->qstr($user_email) . ",
			user_create_date		= " . $db->qstr(time()) . ",
			user_activation_date 	= " . $db->qstr(time());
			
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		return $db->Insert_ID();
	}

	
	function load_num_emps() {
		global $db;
		global $error;
		
		$q = "SELECT COUNT(*) as num_user FROM user WHERE user_type_id ='1'";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		return $rs->fields['num_user'];
		
	}


	// Private Functions

	/** _save
	 *
	 * Type:     Cite CMS Private Methods<br>
	 * Name:     _save<br>
	 * Purpose:  Saves an Address or updates an Address<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return insertID String | The insert Row ID 
	 * @version 1.0
	*/
	function _save() {
	
		global $db;
		global $error;
				
		if($this->fields["user_id"] > 0) {
		
			$db->AutoExecute("user",$this->fields,'UPDATE', "user_id = " . $db->qstr($this->fields["user_id"]));
			
			return $this->fields["user_id"];
			
		} else {
		
			$q = "INSERT INTO user SET
					user_type_id 		= " . $db->qstr( $this->fields['user_type_id']		) . ",
					user_admin			= " . $db->qstr( $this->fields['user_admin']		) ." ,
					user_status			= " . $db->qstr( $this->fields['user_status']		) . ",
					user_username		= " . $db->qstr( $this->fields['user_username']	) . ", 		
					user_password		= " . $db->qstr( $this->fields['user_password']	) . ",
					user_first_name	= " . $db->qstr( $this->fields['user_first_name']) . ", 
					user_last_name		= " . $db->qstr( $this->fields['user_last_name']	) . ", 
					user_email			= " . $db->qstr( $this->fields['user_email']		) . ", 
					user_create_date	= " . $db->qstr( time()										);
					
			if( !$rs = $db->Execute($q) ) {
				$error->dbError( $db->ErrorMsg(), $q );
				exit;
			}

			$this->fields['user_id'] = $db->Insert_ID();
			
			$_SESSION['CLEAR_CACHE'] = true;
			
			
			return $this->fields['user_id'];			
			
		}		
		
	}
	
	
	/** _delete
	 *UPDATE
	 * Type:     Cite CMS Private Methods<br>
	 * Name:     _delete<br>
	 * Purpose:  Deletes all User Information from the DB.<br>
	 * This is used mainly for development and really a user should just be set to suspended.<br>
	 * This really deletes every thing be warned.
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return Boolen  True / False
	 * @version 1.0
	*/
	function _delete() {
		global $db;
		global $error;
		
		// Remove From User Table
		$q = "DELETE FROM user WHERE user_id = " . $db->qstr( $this->fields['user_id']);
		
		if(!$rs = $db->Execute( $q ) ) {
			$error->dbError( $db->ErrorMsg(), $q );
		}
		
		//Delete Address
		$q = "DELETE FROM user_address WHERE user_id = " . $db->qstr( $this->fields['user_id']);
		
		if(!$rs = $db->Execute( $q ) ) {
			$error->dbError( $db->ErrorMsg(), $q );
		}
		
		// Delete Contacts
		$q = "DELETE FROM user_contact WHERE user_id = " . $db->qstr( $this->fields['user_id']);
		
		if(!$rs = $db->Execute( $q ) ) {
			$error->dbError( $db->ErrorMsg(), $q );
		}
	
		// Delete Activation Code
		
		$q = "DELETE FROM activation_code WHERE user_id = " . $db->qstr( $this->fields['user_id']);
		
		if(!$rs = $db->Execute( $q ) ) {
			$error->dbError( $db->ErrorMsg(), $q );
		}
		
		$_SESSION['CLEAR_CACHE'] = true;
		
		return true;
	
	}
	
	
	/** _saveVerificationCode
	 *
	 * Type:     Cite CMS Private Methods<br>
	 * Name:     _saveVerificationCode<br>
	 * Purpose:  Saves new Verification Code<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return Boolen | True / False
	 * @version 1.0
	*/
	function _saveVerificationCode() {
		global $db;
		global $error;
		
		$q = "INSERT INTO activation_code SET
				user_id					= " . $db->qstr( $this->fields['user_id']) . " ,
				activation_code_text	= " . $db->qstr( $this->fields['activation_code_text']) . " ,
				activation_code_type 	= " . $db->qstr( $this->fields['activation_code_type']) . " ,
				activation_code_create = " . $db->qstr( time());
				
		if(!$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(), $q);
			exit;
		}
	
		return $db->Insert_ID();
	
	}


	/**
	 *
	 * Type:     Cite CMS Private Methods<br>
	 * Name:     _deleteActivationCode<br>
	 * Purpose:  Deletes a Verification Code<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return Boolen | True / False
	 * @version 1.0
	*/
	function _deleteActivationCode() {
	
		global $db;
		global $error;
		
		$q =" DELETE FROM activation_code WHERE user_id = " . $db->qstr($this->fields['user_id']);
		
		
		if(!$rs = $db->Execute($q) ) {
			$error->dbError($db->ErrorMsg(), $q);
			exit;
		}
	
		return true;
	
	}
	
	
	
	
}

?>