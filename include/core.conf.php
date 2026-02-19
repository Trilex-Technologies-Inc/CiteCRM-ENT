<?php
/* Load smarty template engine */
$smarty = new Smarty;
$smarty->template_dir 							= TEMPLATE_PATH;
$smarty->compile_dir 							= ROOT_PATH."/cache";
$smarty->config_dir 							= SMARTY_PATH."/configs/";
$smarty->cache_dir 								= ROOT_PATH."/cache/";

$smarty->assign('CURRENT_PAGE', 			$_SERVER['REQUEST_URI']);
$smarty->assign('SESSION_USER_EMAIL',		$_SESSION['user_email']);


// URLS
$smarty->assign('ROOT_URL',					ROOT_URL);
$smarty->assign('CSS_URL', 					CSS_URL);

// Basic site information
$smarty->assign('SITE_NAME', 				SITE_NAME);
$smarty->assign('SITE_SLOGAN', 				SITE_SLOGAN);

// Company Address
$smarty->assign('COMPANY_STREET_1',			COMPANY_STREET_1);
$smarty->assign('COMPANY_STREET_2',			COMPANY_STREET_2);
$smarty->assign('COMPANY_CITY',				COMPANY_CITY);
$smarty->assign('COMPANY_STATE',			COMPANY_STATE);
$smarty->assign('COMPANY_POSTAL_CODE',		COMPANY_POSTAL_CODE);
$smarty->assign('COMPANY_COUNTRY',			COMPANY_COUNTRY);
$smarty->assign('DEFAULT_STATE',            DEFAULT_STATE);
$smarty->assign('DEFAULT_COUNTRY',          DEFAULT_COUNTRY);
$smarty->assign('DEFAULT_ZIP',              DEFAULT_ZIP);
// Company Contact Numbers
$smarty->assign('COMPANY_PHONE',			COMPANY_PHONE);
$smarty->assign('COMPANY_MOBILE',			COMPANY_MOBILE);
$smarty->assign('COMPANY_TOLL_FREE',		COMPANY_TOLL_FREE);
$smarty->assign('COMPANY_EMAIL',			COMPANY_EMAIL);

// Syatem Email
$smarty->assign('SITE_EMAIL_ADMIN',			SITE_EMAIL_ADMIN);
$smarty->assign('SITE_EMAIL',				SITE_EMAIL);
		
// SET DEBUG to 1 to view debug console
$smarty->assign('DEBUG',					DEBUG);

// Tiny MCE
$smarty->assign('TINY_MCE_EDIT', 			TINY_MCE_EDIT);
$smarty->assign('TINY_MCE_THEME',			TINY_MCE_THEME);

// Billing Minute Increaent
define('BILLINGMININCREMENT', 				30);
$smarty->assign('billingMinIncrement', 		BILLINGMININCREMENT);
$smarty->assign('time_increment',			30);

// Invoice Setup
$smarty->assign('DEFAULT_INVOICE_MEMO', 	DEFAULT_INVOICE_MEMO);

$smarty->assign('DATE_FORMAT',				DATE_FORMAT);
$smarty->assign('DATE_TIME_FORMAT',			DATE_TIME_FORMAT);
$smarty->assign('CURRENT_YEAR',             date("Y"));
$smarty->assign('SELECT_YEAR_INCREMENT',    5);

$smarty->assign('COMPANY_START_HOUR',		COMPANY_START_HOUR);
$smarty->assign('COMPANY_START_MIN',		COMPANY_START_MIN);
$smarty->assign('COMPANY_END_HOUR',			COMPANY_END_HOUR);
$smarty->assign('COMPANY_END_MIN',			COMPANY_END_MIN);

// Default State and Country
$smarty->assign('DEFAULTCOUNTRY',			DEFAULTCOUNTRY);
$smarty->assign('DEFAULTSTATE',				DEFAULTSTATE);
$smarty->assign('DEFAULT_CALL_COST', 		DEFAULT_CALL_COST);

$smarty->assign('COMPANY_LOGO',				COMPANY_LOGO);
// Printing
$smarty->assign('PDF_PRINTING',			    PDF_PRINTING);
$smarty->assign('DISPLAY_COMPANY_LOGO',		DISPLAY_COMPANY_LOGO);
$smarty->assign('SYSTEMLABEL',				SYSTEMLABEL);

// Uploads
ini_set('upload_tmp_dir', 					UPLOAD_TMP_DIR);
ini_set('upload_max_filesize',				UPLOAD_MAX_FILESIZE);

$smarty->assign('SYSTEMLABEL',				SYSTEMLABEL);
$smarty->assign('DEFAULTAREACODE',			DEFAULTAREACODE);
$smarty->assign('SESSION_TIMEOUT',			SESSION_TIMEOUT);
$smarty->assign('GOOGLEAPIKEY',             GOOGLEAPIKEY);
?>