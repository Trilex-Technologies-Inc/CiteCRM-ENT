<?php
// Name to use for login variable e.g. $_POST['login']
@define('USER_LOGIN_VAR', 'user_email');
// Name to use for password variable e.g. $_POST['password']
@define('USER_PASSW_VAR', 'user_password');

/** 
 * Type:     Cite CMS Core Class<br>
 * Name:    Auth<br>
 * Purpose:  For all auth methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class Auth {

  var $session;
  var $redirect;
  var $hashKey;
  var $md5;
  var $from;
  var $errorMsg;


	
	/**  Auth
	 *
	 * Type:     Public Function<br>
	 * Name:     Auth<br>
	 * Purpose:  Authorises a Login<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $db 			object The  DB object
	 * @param $redirect    String The page to redirect: login page
	 * @param $hashKey		String The hash of the username and password verification key
	 * @param $md5			Boolen True/False wether to use MD5 pashwod encryption Default to true
	 * @uses session
	 * @access Public
	 * @return 
	 * @version 1.0
	*/
	function Auth($db, $redirect, $hashKey, $md5 = true){
	
		$this->db			= $db;
		$this->redirect 	= $redirect;
		$this->hashKey  	= $hashKey;
		$this->md5      	= $md5;
		$this->session  	= &new Session();
		$this->from 		= $_REQUEST['from'];
		$this->errorMsg		="";
		$this->login();
		
		
	}
   
 
 	/**  login
	 *
	 * Type:     Private  Method<br>
	 * Name:     login<br>
	 * Purpose:  Authorises a Login<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @uses session
	 * @access private
	 * @return 
	 * @version 1.0
	*/
	function login() {
	
		global $smarty;
		
    	// See if we have values already stored in the session
		if ($this->session->get('login_hash')) {
			$this->confirmAuth();
			return;
		}

   		 // If this is a fresh login, check $_POST variables
		if (!isset($_POST[USER_LOGIN_VAR]) ||!isset($_POST[USER_PASSW_VAR])) {
		
			
			$this->errorMsg = "Incrorect Form  Field Vars. Please check your Config";
			$this->redirect();
			
		}

    if ($this->md5) {
      $password = md5($_POST[USER_PASSW_VAR]);
    } else {
      $password = $_POST[USER_PASSW_VAR];
    }

    // Escape the variables for the query
    $login = $_POST[USER_LOGIN_VAR];
    $password = $password;
  
    // Query to count number of users with this combination
    $sql = "SELECT COUNT(*) AS num_users FROM user WHERE  user_email = '$login' AND  user_password='$password'";


    $result = $this->db->Execute($sql);
	
    $row = $result->FetchRow();


	

	// If there isn't is exactly one entry, redirect
	if ($row['num_users'] != 1) {   
	
		$this->errorMsg = "Faild Login";
		$this->redirect();
      
	// Else is a valid user; set the session variables
	} else {
		/* grab their login ID for tracking purposes */
		$sql = "SELECT user_id,user_admin,user_status, user_perms FROM user WHERE user_email='$login'";
		$result = $this->db->Execute($sql);
    	$row = $result->FetchRow();
		
		if (!isset($row['user_id'])) { /* We did not get a login ID */
		
			$this->errorMsg = "Faild Login";
      		$this->redirect(); 
      		
		} else {
			$login_id  	= $row['user_id'];
			$admin	  	= $row['user_admin'];
			$status	  	= $row['user_status'];
			$user_perms = $row['user_perms'];
			
			if($status == "Pending") {
				$this->from = "index.php?page=user:activate_user";
				$this->redirect();
			}
			
			if($status == "Suspended") {
				$this->from = "index.php?page=supended_user";
				$this->redirect();
			}
			
			if($status == "Closed") {
				$this->from = "index.php?page=closed_user";
				$this->redirect();
			}
			
		}
	
      $this->storeAuth($login, $password, $admin,$status, $login_id,$user_perms);
    }
  }
  
  

	/** function storeAuth
	 * @param $login
	 * @param $password
	 * @param $admin
	 * @param $status
	 * @param $login_id
	 * @uses session
	*/
	function storeAuth($login, $password, $admin,$status,$login_id,$user_perms) {
  
		global $smarty;
  		global $db;
  
		$this->session->set(USER_LOGIN_VAR, 			$login);
		$this->session->set(USER_PASSW_VAR, 			$password);

		$this->session->set('SESSION_USER_ID', 			$login_id);
		$this->session->set('SESSION_ADMIN', 			$admin);
		$this->session->set('SESSION_USER_STATUS',		$status);
		$this->session->set('SESSION_USER_PERMS',		$user_perms);
			
		// Create a session variable to use to confirm sessions
		$hashKey = md5($this->hashKey . $login . $password);
		$this->session->set('login_hash', $hashKey); 
		  
		
	}
  
  
	function confirmAuth(){
	
		$login 		= $this->session->get(USER_LOGIN_VAR);
		$password 	= $this->session->get(USER_PASSW_VAR);
		
		$hashKey = $this->session->get('login_hash');
		
		if (md5($this->hashKey . $login . $password) != $hashKey){
			
			$this->errorMsg = "Your Not Logged in";
			$this->logout(true);
					
		}
	}
  
  
 	/** function logout
 	 *
	*/
	function logout() {
	
		session_destroy();	

		$this->from = '';

		$this->redirect();
  }
  
 
  function redirect() {
  	global $core;
  
    if ($this->from) {


      	$core->force_page( $this->from . "&errorMsg=" . $this->errorMsg) ;
    } else {

     	$core->force_page('index.php?page=user:login_user');
     
    }
    exit();
  }
}
  
  
?>