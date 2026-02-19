<?php
$core->verifyAdmin(SUPER_ADMIN);
require_once(SOAP_PATH.'/nusoap.php');

$debug = true;

$version = $core->get_running_version();

$pices = explode("-",$version);

$major 		= $pices[0];
$revision 	= $pices[1];

$params = array($key_file,$major,$revision);


$client  = new soapclient('http://www.citecrm.com/index.php?page=update:check_version');

$result = $client->call('check_version', array('params' => $params));

print_r($result);

if (!$client->getError()) {

	if($debug == true) {
		print_r($result);
	}

	$update_avail = $result['update_avail'];



	if($update_avail == 1) {
		$msg = "Update Available!";
		$update_version = $result['major']."-".$result['revision'];
		$update_file = $result['update_path'];
		$update_date = $result['revision_date'];
	} else {
		$msg = "No update Available";
	}
	
} else {
	$errorMsg = '<h1>Error: ' . $client->getError() . '</h1>';
}

$smarty->assign('update_avail',$update_avail);
$smarty->assign('msg',$msg);
$smarty->assign('update_version',$update_version);
$smarty->assign('update_file',$update_file);
$smarty->assign('update_date',$update_date);

$smarty->display('core/check_update.tpl');

?>