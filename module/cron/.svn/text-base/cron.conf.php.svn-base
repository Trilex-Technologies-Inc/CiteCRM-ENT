<?php
//require("../../conf.php"); Uncomment if you want to use system CRON

define('CRON_SLEEP',    0);
define('ADODB_PATH',	ROOT_PATH.'/adodb');
define('CLASS_PATH',	ROOT_PATH.'/classes');

require_once(ADODB_PATH."/adodb.inc.php");
require_once(CLASS_PATH."/core/translate.class.php");

/* create adodb database connection */
$db = &ADONewConnection('mysql');
$db->Connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>