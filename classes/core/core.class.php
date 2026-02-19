<?php
require(CLASS_PATH.'/getter/core_getter.class.php');


/** 
 * Type:     Cite CMS Core Class<br>
 * Name:     core<br>
 * Purpose:  For all user methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class  Core extends core_getter {



	function core() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("core");

		
		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$trans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($trans,$val);
			}
		}
	
		
	
	}

	/**  force_page
	 *
	 * Type:     Public Function<br>
	 * Name:      force_page<br>
	 * Purpose:  Does PAge redirection. Pass the full page Exapmle: force_page('index.php?page=user:view')<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $page The page to redirect to
	 * @access Public
	 * @return Java Script Redirect
	 * @version 1.0
	*/
	function force_page($page){
	
		echo("
		<script type=\"text/javascript\">
			<!--
			window.location = \"$page\"
			//-->
		</script>");
	
	}


	/**  createVerificationCode
	 *
	 * Type:     Public Function<br>
	 * Name:      pageSetup<br>
	 * Purpose:  Sets up the page headers and meta tags: title, keyword, description.<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param String $length | The length of the code defaults to 24
	 * @access Public
	 * @return null
	 * @version 1.0
	*/
	function pageSetup($page) {
	
		global $db;
		global $error;
		
		$q = "SELECT * FROM page_setup WHERE page_setup_name = " . $db->qstr( $page );		
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			die;
		}
				
		$tempArray = $rs->GetArray();
		if(!empty($tempArray)){
			$this->fields = $tempArray[0];
		}
		
	}
	
	
	/**  updatePageView
	 *
	 * Type:     Public Function<br>
	 * Name:     updatePageView<br>
	 * Purpose: Updates the Page view Count<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $page The page requested
	 * @access Public
	 * @return true
	 * @version 1.0
	 * @uses error::dbError
	*/
	function updatePageView($page) {
		global $db;
		global $error;
		
		$q = "UPDATE page_setup SET page_views = page_views+1 WHERE  page_setup_name = " . $db->qstr( $page ) ;
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
		}		
	
		return true;
		
	}
	
	
	
	/**  createPage
	 *
	 * Type:     Public Function<br>
	 * Name:     verifyAdmin<br>
	 * Purpose: Sets up the page requested by splitting Module:Page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $page The page to load
	 * @access Public
	 * @return $the_page The page requested
	 * @version 1.0
	 * 
	*/
	function createPage() {
	
		global $error;
	
		// Build URL
		if ( $_REQUEST['page']) {
			// Explode the url so we can get the module and page
			list($module, $page) = explode(":", $_REQUEST['page']);
			
			
				
			$the_page = MODULE_PATH."/".$module."/".$page.".php";
				
			// Check to see if the page is real other wise send em a 404
			if ( file_exists ($the_page) ) {
				$the_page= MODULE_PATH."/".$module."/".$page.".php";	 
			} else {		
				$the_page = $error->fileNotFound();			
			}
				
		} else {
			// If no page is supplied then go to the main page
			$_REQUEST['page'] = "core:main";
			$the_page= MODULE_PATH."/core/main.php";
		}
		
		return $the_page;
	
	}
	
	
	/**  verifyAdmin
	 *
	 * Type:     Public Function<br>
	 * Name:      verifyAdmin<br>
	 * Purpose:  Verifies Admin rights and checks group permisions for the page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $page The page to check group permisions
	 * @access Public
	 * @return true Redirect to 403 if auth fails
	 * @version 1.0
	 * @todo Build group permisions and validate the perms
		define('CAN_READ',       	1);
		define('CAN_PRINT',		 	2);
		define('CAN_CREATE',     	4);
		define('CAN_EDIT',       	8);
		define('CAN_DELETE',    	16);
		define('CAN_READ_OTHERS',	32);
		define('CAN_EDIT_OTHER', 	64);
		define('SUPER_USER',		128);
 	*/		
	function verifyAdmin($PERM_BIT=1) {
		global $error;
		
		//print $_SESSION['SESSION_USER_PERMS'];
		
		if($_SESSION['SESSION_ADMIN'] != 1) {
			$this->force_page('index.php?page=user:login_user&from='.$_SERVER['REQUEST_URI']);	
		} else {
					
			if($_SESSION['SESSION_USER_PERMS'] & $PERM_BIT) {
				return true;				
			} else {
				print "You do not have permissions to do this";
				die;
				
			}
		
			
		} 
	}
	
	
	
	/**
	 * Type:     Cite CMS Core Class<br>
	 *
	 * Type:     Public Function<br>
	 * Name:      isAdmin()<br>
	 * Purpose:  Verifies Admin rights and checks group permisions for the page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Public
	 * @return true/false
	 * @version 1.0
	*/
	function isAdmin(){
		
		if($_SESSION['SESSION_ADMIN'] != 1) {
			return false;
		} else {
			return true;
		}

	}
	
	/**  fetchAdm
	 *
	 * Type:     Public Function<br>
	 * Name:      fetchAdminMenu<br>
	 * Purpose:  Gets the admin Menu<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Public
	 * @return Array Object
	 * @version 1.0
	*/
	function fetchAdminMenu() {
		global $db;
		global $error;
		
		
	
	}

	
	function resize_jpg($inputFilename, $new_side){	
		$imagedata = getimagesize($inputFilename);	
		$w = $imagedata[0];	$h = $imagedata[1];		
		if ($h > $w) {		
			$new_w = ($new_side / $h) * $w;		
			$new_h = $new_side;		
		} else {		
			$new_h = ($new_side / $w) * $h;		
			$new_w = $new_side;	
		}		
		$im2 = ImageCreateTrueColor($new_w, $new_h);	
		$image = ImageCreateFromJpeg($inputFilename);	
		imagecopyResampled ($im2, $image, 0, 0, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]);	
		return $im2;

	
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

        return $decrypted;
    } 
	
	
	

	
    function n_round($number, $precision) {

    if (strpos($number, '.') && (strlen(substr($number, strpos($number, '.')+1)) > $precision)) {
      $number = substr($number, 0, strpos($number, '.') + 1 + $precision + 1);

      if (substr($number, -1) >= 5) {
        $number = substr($number, 0, -1) + ('0.' . str_repeat(0, $precision-1) . '1');
      } else {
        $number = substr($number, 0, -1);
      }
    }

    return $number;
  }

	// Requires Date Format yyyy-mm-dd hh:mm:ss
	function convert_str_to_secs($timeStr) {
  		$parseRegEx = "/([0-9]*)-([0-9]*)-([0-9]*) ([0-9]*):([0-9]*):([0-9]*)/";
  		if (preg_match_all( $parseRegEx, $timeStr, $arr )){
    		$yr  = $arr[1][0];
    		$mo  = $arr[2][0];
   		 	$da  = $arr[3][0];
    		$hr  = $arr[4][0];
    		$mi  = $arr[5][0];
    		$se  = $arr[6][0];
    		return mktime($hr, $mi, $se, $mo, $da, $yr);
    	}
  		return 0;
  	}

	function convert_text_to_html($string) {
		
		$string = str_replace("\n", "<br>", $string);

		return $string;
	}

	function convert_html_to_text($string){
		$string = str_replace("<br>", "\n", $string);
		return $string;
	}
	
	/**
		EXAMPLES
		$date1="07/11/2003";
		$date2="09/04/2004";

		print "If we minus " . $date1 . " from " . $date2 . " we get " . dateDiff("/", $date2, $date1) . "."; 

		$dob="08/12/1975";
		echo "If you were born on " . $dob . ", then today your age is approximately " . round(dateDiff("/", date("m/d/Y", time()), $dob)/365, 0) . " years."; 

	*/
	function dateDiff($dformat, $endDate, $beginDate){
           $date_parts1=explode($dformat, $beginDate);
           $date_parts2=explode($dformat, $endDate);
           $start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
           $end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
           return $end_date - $start_date;
	} 

	function get_running_version() {
		global $db;
		global $error;
		
		$q = "SELECT configure_value FROM configure WHERE configure_name = 'revision'";		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$revision = $rs->fields['configure_value'];
		
		$q = "SELECT configure_value FROM configure WHERE configure_name = 'major'";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		$major = $rs->fields['configure_value'];
		
		$version = $major."-".$revision;
		
		return $version;
	}


    function prepare_post($string) {
        $string = htmlspecialchars(trim($string));
        $string = str_replace("\n", '<br />', $string);
            
        return $string;
    }

    function prepare_edit($string) {
 
        $string = str_replace("<br />", "\n", $string);
        $string = str_replace("<br>", "\n", $string);
        $string = str_replace("<br/>", "\n", $string);
        $string = str_replace("<b>", "", $string);
        $string = str_replace("</b>", "", $string);

        
        return $string;
    }

	function escape_javascript($string){
		return strtr($string, array('\\'=>'\\\\',"'"=>"\\'",'"'=>'\\"',"\r"=>'\\r',"\n"=>'\\n','</'=>'<\/'));
	}
    


    function display_names($user_id) {
        global $db;
        global $error;

        $q = "SELECT user_first_name, user_last_name FROM user WHERE user_id = " . $db->qstr($user_id);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

        $name = $rs->fields['user_first_name'] . " " . $rs->fields['user_last_name'];

        return $name;

    }


    /** @Param employee_log_type enum('Log In', 'Log Out', 'View', 'Edit', 'Delete', 'Create', 'Search') */
    function log_action($employee_id,$employee_log_type,$employee_log_action) {
        global $db;
        global $error;

        $q = "INSERT INTO employee_log SET
                employee_id             = " . $db->qstr($employee_id) . ",
                employee_log_type       = " . $db->qstr($employee_log_type) . ",
                employee_log_action     = " . $db->qstr($employee_log_action) . ",
                employee_log_ipaddress  = " . $db->qstr($this->getIP()) . ",
                employee_log_browser    = " . $db->qstr(getenv('HTTP_USER_AGENT')) . ",
                employee_log_timestamp  = " . $db->qstr(time()) . ",
                employee_log_session_id = " . $db->qstr(session_id());

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
        

    }

    function getIP() {
        $ip;
        if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR")) $ip = getenv("REMOTE_ADDR");
        else $ip = "UNKNOWN";
        return $ip;
    }

    function generatePassword($length = 8){
    // start with a blank password
    $password = "";

    // define possible characters
    $possible = "0123456789bcdfghjkmnpqrstvwxyz"; 
        
    // set up a counter
    $i = 0; 
        
    // add random characters to $password until $length is reached
    while ($i < $length) { 

        // pick a random character from the possible ones
        $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
            
        // we don't want this character if it's already in the password
        if (!strstr($password, $char)) { 
        $password .= $char;
        $i++;
        }

    }

    // done!
    return $password;
}

function phone_format($string){
    $npa =  substr($string, 0, 3);
    $nnx =  substr($string, 3, 3);
    $line =  substr($string, 6, 4);

    if(!empty($npa)){
        $phone = "($npa) $nnx - $line";
    } else {
        $phone = $nnx . $line;
    }

    return $phone;

}

function truncate($string, $length = 80, $etc = '...', $break_words = false, $middle = false){
    if ($length == 0)
        return '';

    if (strlen($string) > $length) {
        $length -= strlen($etc);
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
        }
        if(!$middle) {
            return substr($string, 0, $length).$etc;
        } else {
            return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
        }
    } else {
        return $string;
    }
}

function system_manufacture_name($string) {

	require_once(CLASS_PATH."/core/system_manufacture.class.php");
	
	$system_manufacture = new system_manufacture();
	
	$system_manufacture->view_system_manufacture($string);
	
	$string = $system_manufacture->get_manufacture_name();
	
	if(empty($string)) {
		$string = "N/A";
	}
	
	return $string;
}

function operating_system_name($string) {

	require_once(CLASS_PATH."/core/operating_system.class.php");
	
	$operating_system = new operating_system();
	
	$operating_system->view_operating_system($string);
	
	$string = $operating_system->get_operating_system_name();
	
	if(empty($string)) {
		$string = "N/A";
	}
	
	return $string;

}

	function load_configure() {
		global $db;
		global $error;
		
		$q = "SELECT * FROM configure";		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$configureArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {
			$configureArray[$counter] = new core();
			$configureArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}

		return $configureArray;
	}
	
	function save_config_value($configure_name,$configure_value) {
		global $db;
		global $error;
		
		$q = "UPDATE configure set
				configure_value = " . $db->qstr($configure_value) . "
				WHERE configure_name = " . $db->qstr($configure_name);
	
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}	
		
	}
	
	function write_config(){
		global $db;
		global $error;
		
		
		$q = "SELECT * FROM configure";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		while(!$rs->EOF) {
			if($rs->fields['configure_name'] == 'SITE_NAME'){
				$SITE_NAME = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_EMAIL'){
				$COMPANY_EMAIL = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'SSL_URL'){
				$SITE_EMAIL_ADMIN = $rs->fields['SITE_EMAIL_ADMIN'];
			}
			if($rs->fields['configure_name'] == 'SITE_NAME'){
				$SITE_NAME = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'SITE_SLOGAN'){
				$SITE_SLOGAN = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'DEFAULT_LANGUAGE'){
				$DEFAULT_LANGUAGE = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'SITE_EMAIL'){
				$SITE_EMAIL = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'SITE_EMAIL_ADMIN'){
				$SITE_EMAIL_ADMIN = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_STREET_1'){
				$COMPANY_STREET_1 = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_STREET_2'){
				$COMPANY_STREET_2 = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_CITY'){
				$COMPANY_CITY = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_STATE'){
				$COMPANY_STATE = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_POSTAL_CODE'){
				$COMPANY_POSTAL_CODE = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_COUNTRY'){
				$COMPANY_COUNTRY = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_PHONE'){
				$COMPANY_PHONE = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_MOBILE'){
				$COMPANY_MOBILE = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_TOLL_FREE'){
				$COMPANY_TOLL_FREE = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_FAX'){
				$COMPANY_FAX = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'DEFAULTAREACODE'){
				$DEFAULTAREACODE = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_START_HOUR'){
				$COMPANY_START_HOUR = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_START_MIN'){
				$COMPANY_START_MIN = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_END_HOUR'){
				$COMPANY_END_HOUR = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_END_MIN'){
				$COMPANY_END_MIN = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'SESSION_TIMEOUT'){
				$SESSION_TIMEOUT = $rs->fields['configure_value'];
			}
            if($rs->fields['configure_name'] == 'DEFAULT_STATE'){
                $DEFAULT_STATE = $rs->fields['configure_value'];
            }
            if($rs->fields['configure_name'] == 'DEFAULT_COUNTRY'){
                $DEFAULT_COUNTRY = $rs->fields['configure_value'];
            }
            if($rs->fields['configure_name'] == 'DEFAULT_ZIP'){
                $DEFAULT_ZIP = $rs->fields['configure_value'];
            }
            if($rs->fields['configure_name'] == 'DEFAULT_CALL_COST'){
				$DEFAULT_CALL_COST = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_LOGO'){
				$COMPANY_LOGO = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_SMTP_SERVER'){
				$COMPANY_SMTP_SERVER = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_SMTP_USER'){
				$COMPANY_SMTP_USER = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_SMTP_PASSWORD'){
				$COMPANY_SMTP_PASSWORD = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_SMTP_FROM'){
				$COMPANY_SMTP_FROM = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'COMPANY_SMTP_REPLY'){
				$COMPANY_SMTP_REPLY = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'PDF_PRINTING'){
				$PDF_PRINTING = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'DISPLAY_COMPANY_LOGO'){
				$DISPLAY_COMPANY_LOGO = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'SYSTEMLABEL'){
				$SYSTEMLABEL = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'DATE_TIME_FORMAT'){
				$DATE_TIME_FORMAT = $rs->fields['configure_value'];
			}
			if($rs->fields['configure_name'] == 'DATE_FORMAT'){
				$DATE_FORMAT = $rs->fields['configure_value'];
			}
			$rs->MoveNext();
		}

		
		$contents = 
			"<?php\n" .
			"define('ROOT_PATH', '".ROOT_PATH."');\n" .
			"define('ROOT_URL', '".ROOT_URL."');\n" .
			"define('SSL_URL','".SSL_URL."');\n"	.
			"define('DB_HOST', '".DB_HOST."');\n" .
			"define('DB_USER', '".DB_USER."'); \n" .
			"define('DB_PASS', '".DB_PASS."');\n" .
			"define('DB_NAME', '".DB_NAME."');\n" .
			"define('SITE_NAME',  '$SITE_NAME');\n".
            "define('SITE_EMAIL','$SITE_EMAIL');\n".
            "define('SITE_EMAIL_ADMIN','$SITE_EMAIL_ADMIN');\n".
			"define('SITE_SLOGAN','$SITE_SLOGAN');\n" .
			"define('DEFAULT_LANGUAGE','$DEFAULT_LANGUAGE');\n" .
			"define('COMPANY_STREET_1','$COMPANY_STREET_1');\n" .
			"define('COMPANY_STREET_2','$COMPANY_STREET_2');\n" .
			"define('COMPANY_CITY','$COMPANY_CITY');\n" .
			"define('COMPANY_STATE','$COMPANY_STATE');\n" .
			"define('COMPANY_POSTAL_CODE','$COMPANY_POSTAL_CODE');\n" .
			"define('COMPANY_COUNTRY','$COMPANY_COUNTRY');\n" .
			"define('COMPANY_PHONE','$COMPANY_PHONE');\n" .
			"define('COMPANY_MOBILE','$COMPANY_MOBILE');\n" .
			"define('COMPANY_TOLL_FREE','$COMPANY_TOLL_FREE');\n" .
			"define('COMPANY_FAX','$COMPANY_FAX');\n" .
			"define('DEFAULTAREACODE','$DEFAULTAREACODE');\n" .
			"define('COMPANY_START_HOUR','$COMPANY_START_HOUR');\n" .
			"define('COMPANY_START_MIN','$COMPANY_START_MIN');\n" .
			"define('COMPANY_END_HOUR','$COMPANY_END_HOUR');\n" .
			"define('COMPANY_END_MIN','$COMPANY_END_MIN');\n" .
			"define('SESSION_TIMEOUT','$SESSION_TIMEOUT');\n" .
            "define('DEFAULT_STATE','$DEFAULT_STATE');\n" .
            "define('DEFAULT_COUNTRY','$DEFAULT_COUNTRY');\n" .
            "define('DEFAULT_ZIP','$DEFAULT_ZIP');\n" .
            "define('DEFAULT_CALL_COST', '$DEFAULT_CALL_COST');\n" .
            "define('COMPANY_SMTP_SERVER', '$COMPANY_SMTP_SERVER');\n" .
            "define('COMPANY_SMTP_USER', '$COMPANY_SMTP_USER');\n" .
            "define('COMPANY_SMTP_PASSWORD', '$COMPANY_SMTP_PASSWORD');\n" .
            "define('COMPANY_SMTP_FROM', '$COMPANY_SMTP_FROM');\n" .
            "define('COMPANY_SMTP_REPLY', '$COMPANY_SMTP_REPLY');\n" .
            "define('COMPANY_LOGO', '$COMPANY_LOGO');\n".
            "define('PDF_PRINTING', '$PDF_PRINTING');\n".
            "define('DISPLAY_COMPANY_LOGO', '$DISPLAY_COMPANY_LOGO');\n".
            "define('SYSTEMLABEL', '$SYSTEMLABEL');\n".
            "define('DATE_TIME_FORMAT', '$DATE_TIME_FORMAT');\n".
            "define('DATE_FORMAT', '$DATE_FORMAT');\n".
			"?>";
			
			$conf = ROOT_PATH."/conf.php";
	
			$fh = fopen($conf, 'w+') or die("can't open file: ".$conf );
			fwrite($fh, $contents);
			fclose($fh);
			
	}
	

}
?>