<?php
$key_file = "1t087-nfpzg-wpx9j-m3tnr-264bx";


require("conf.php");
// Uploads
define('UPLOAD_TMP_DIR',					"/tmp/"); // Upload Temp directory
define('UPLOAD_MAX_FILESIZE',				"10240"); // Max Upload Size
define('FILE_SAVE_PATH',					ROOT_PATH."/files/"); // Where you want to save files. INclude trailing /


define('PAGINATION',						20); // Large Pagination Max Result
define('SMALLPAGINATION',					5); // Small Pagination Result

define('EMPLOYEE_TYPE_ID',					1); // Default Employee Type ID. See employee_type table for more options
define('PHP_DATE_FORMAT',                   "m-d-Y");

// SET DEBUG to 1 to view debug console
define('DEBUG',							    0); // Debug

// Tiny MCE HTML Editor
define('TINY_MCE_EDIT',                      1); // 1 enbaled 0 disabled.
define('TINY_MCE_THEME',                    'simple');// simple or advanced

// Activation code Expire
define('VERIFICATION_CODE_EXPIRE',		     12); // In hours default is 12

// Auto Billing and Auto Invoice Creation
define('BILL_FIRST_OF_MONTH',				1);// Set to 1 to enable invocie creation on the first of the month else 0 for Annerversiery billin
// Invoice Setup
define('DEFAULT_INVOICE_MEMO',				'Thank you for using Cite CRM'); // Thank you at bottom of invoice
define('INVOICE_DUE_DAYS',					0); // You invoice due in number of days ie Due in 30 Days. Set to 0 for due at creation date

// Authorize Set up
define('AN_LOGIN',							'dion01');
define('AN_PASSWD',						    '');
define('AN_KEY',							'qdpU5LodyHj5MShG');
define('CURENCY_CODE',					    'USD'); //curency_code

 // Dymo LW400 4 x 2-5/16 Label See Printing help www.citecrm.com for more options

define('GOOGLEAPIKEY',                      'ABQIAAAA5bNKOrsSL8JVrdhHjpvf9RQXx2DsEh9MpR3NWUON3jOQZLBnwRRc1DmMLe_tx4dF3WgBbiBkyEAYYA');

define('DEFAULT_CALL_COST_PER_MIN',         '1.25');

// Bitwise Permisions. Do not edit these unless you know what your doing!
define('CAN_READ',       	1);
define('CAN_PRINT',		 	2);
define('CAN_CREATE',     	4);
define('CAN_EDIT',       	8);
define('CAN_DELETE',    	16);
define('CAN_READ_OTHERS',	32);
define('CAN_EDIT_OTHER', 	64);
define('SUPER_USER',		128);

// Paths Should only need to edit ROOT_PATH unless your doing something wierd //

define('INCLUDE_PATH',  ROOT_PATH.'/include');
define('IMAGE_PATH',    ROOT_PATH.'/images');
define('SMARTY_PATH', 	ROOT_PATH.'/smarty');
define('ADODB_PATH',	ROOT_PATH.'/adodb');
define('CLASS_PATH',	ROOT_PATH.'/classes');
define('TEMP_PATH',		ROOT_PATH.'/tmp');
define('FPDF_FONTPATH',	INCLUDE_PATH.'/font/');
define('MODULE_PATH',	ROOT_PATH.'/module');
define('TEMPLATE_PATH',	ROOT_PATH.'/template');
define('CACHE_PATH',	ROOT_PATH.'/cache');
define('EMAIL_TEMPLATE',ROOT_PATH.'/template/email');
define('PACKAGE_PATH',	ROOT_PATH.'/package');
define('BACKUP_PATH',	ROOT_PATH.'/backup');
define('CSS_URL',		ROOT_URL.'/css');
define('STRKEY',		$key_file);
define("SOAP_PATH",  ROOT_PATH . "/nusoap-0.7.2/lib/");

/* Load required Includes */
require_once(CLASS_PATH."/core/session.class.php");
require_once(CLASS_PATH."/core/auth.class.php");

require_once(INCLUDE_PATH.'/authPages.inc.php');
require_once(SMARTY_PATH."/Smarty.class.php");
require_once(SMARTY_PATH."/SmartyValidate.class.php");
require_once(ADODB_PATH."/adodb.inc.php");

require_once(CLASS_PATH."/core/core.class.php");
require_once(CLASS_PATH."/core/error.class.php");
require_once(CLASS_PATH."/core/mail.class.php");
require_once(CLASS_PATH."/core/module.class.php");
require_once(CLASS_PATH."/core/translate.class.php");

require_once(CLASS_PATH."/core/support_call.class.php");

require(INCLUDE_PATH."/core.conf.php");
/* create adodb database connection */
$db = &ADONewConnection('mysql');
$db->Connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$ADODB_SESSION_DRIVER		= 'mysql';
$ADODB_SESSION_CONNECT		= DB_HOST;
$ADODB_SESSION_USER 		= DB_USER;
$ADODB_SESSION_PWD 			= DB_PASS;
$ADODB_SESSION_DB 			= DB_NAME;

require(ADODB_PATH.'/session/adodb-session.php');
adodb_sess_open(false,false,false);

ini_set('session.gc_maxlifetime', SESSION_TIMEOUT);

session_start();

$_SESSION['AVAR'] = 0;
$smarty->assign('SESSION_USER_EMAIL',		$_SESSION['user_email']);
//print_r($_SESSION);

$currentTimeoutInSecs = ini_get('session.gc_maxlifetime');
$smarty->assign('currentTimeoutInSecs',$currentTimeoutInSecs);


$core 		= new Core();
$error 		= new Error();
$module		= new Module();
$supportObj = new support_call();

if(!isset($_SESSION['SESSION_USER_ID'])){
	$_SESSION['SESSION_USER_ID'] = '';
}

$supportObj->load_running_call_by_login($_SESSION['SESSION_USER_ID']);

$smarty->assign('supportObj',$supportObj);

// Tasks
require_once(CLASS_PATH."/core/company_task.class.php");
$taskObj = new company_task();
$task_due_array = $taskObj->load_task_due_today();
$smarty->assign('task_due_array',$task_due_array);

$smarty->load_filter('output','trimwhitespace');

$smarty->assign('module', $module);

$smarty->assign($_SESSION);

$smarty->assign($_REQUEST);


if(!isset($_REQUEST['page'])){
	$_REQUEST['page'] = "core:main";
}


list($module, $page) = explode(":", $_REQUEST['page']);

$smarty->assign('MODULE', $module);

$smarty->assign('PAGE', $page);


// We are activating
if(isset($_GET['activate'])) {
	if($_GET['key'] == md5($key_file) ) {
		$q = "UPDATE configure SET configure_value = " . $db->qstr($_GET['key']) . " WHERE configure_name = 'licenseKey'";
		$rs = $db->Execute($q);
	} else {
		print "Invalid Activation Key";
		die;
	}
}


if(isset($_GET['deactivate'])) {
	if($_GET['key'] == md5($key_file) ) {
		$q = "UPDATE  configure SET configure_value = " . $db->qstr(''). " WHERE configure_name = 'licenseKey'";
		$rs = $db->Execute($q);
		print "Site has been suspended";
		die;
	} else {
		print "Invalid Activation Key";
		die;
	}
}

// Check if we already active
$q = "SELECT configure_value FROM configure WHERE configure_name = 'licenseKey'";
$rs = $db->Execute($q);


/*
if($rs->fields['configure_value'] != md5($key_file)){
	$core->force_page("http://www.citecrm.com/index.php?page=activate:activation&activationcode=$key_file");
}
*/

/** Load Auth pages
foreach ($auth_pages as $auth_pages) {

	if($_REQUEST['page'] == $auth_pages) {
		$auth = &new Auth($db, 'index.php', 'secret');
	}
	
}
*/

// If we have logout
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout') {
	$auth = &new Auth($db, 'index.php', 'secret');
	$auth->logout('/');
}


// Set Up Page
$core->pageSetup($_REQUEST['page']);

$core->updatePageView($_REQUEST['page']);

$smarty->assign('core',$core);

require($core->createPage());


if(DEBUG == 1) {	

	print '<pre>';
	print_r($smarty);
	print '</pre>';

}

// Load Cron 
require_once(ROOT_PATH."/module/cron/pseudo-cron.inc.php");
?>