<?php

require_once("conf.php");

define('ADODB_PATH',	ROOT_PATH.'/adodb');
define('CLASS_PATH',	ROOT_PATH.'/classes');

require_once(ADODB_PATH."/adodb.inc.php");
require_once(CLASS_PATH."/core/core.class.php");
require_once(CLASS_PATH."/core/translate.class.php");

$core = new Core();

/* create adodb database connection */
$db = &ADONewConnection('mysql');
$db->Connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


require_once(CLASS_PATH."/core/company_contact.class.php");

$company_contactObj = new company_contact();

$old_number = $_GET['number'];

//Remove non-numeric characters that might exist (e.g. hyphens)
$number = ereg_replace('[^0-9]', '', $old_number);

print $number;

$company_contactObj->number_search($number);


if(!empty($company_contactObj->fields['company_id'])) {
    $core->force_page('/index.php?page=company:view_company&company_id='.$company_contactObj->fields['company_id']);
}


?>