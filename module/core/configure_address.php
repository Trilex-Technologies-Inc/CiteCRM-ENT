<?php

/**
 * @author 
 * @copyright 2007
 */
$core->verifyAdmin(SUPER_USER);

if(isset($_POST['submit'])){

	$core->save_config_value('COMPANY_STREET_1',	$_POST['COMPANY_STREET_1']);
	$core->save_config_value('COMPANY_STREET_2',	$_POST['COMPANY_STREET_2']);
	$core->save_config_value('COMPANY_CITY',		$_POST['COMPANY_CITY']);
	$core->save_config_value('COMPANY_STATE',		$_POST['COMPANY_STATE']);
	$core->save_config_value('COMPANY_POSTAL_CODE',	$_POST['COMPANY_POSTAL_CODE']);
	$core->save_config_value('COMPANY_COUNTRY',		$_POST['COMPANY_COUNTRY']);
	$core->save_config_value('SITE_NAME', 			$_POST['SITE_NAME']);
	$core->save_config_value('SITE_SLOGAN', 		$_POST['SITE_SLOGAN']);
	$core->save_config_value('SITE_EMAIL', 			$_POST['SITE_EMAIL']);
	$core->save_config_value('SITE_EMAIL_ADMIN', 	$_POST['SITE_EMAIL_ADMIN']);
	$core->save_config_value('COMPANY_PHONE', 		$_POST['COMPANY_PHONE']);
	$core->save_config_value('COMPANY_MOBILE', 		$_POST['COMPANY_MOBILE']);
	$core->save_config_value('COMPANY_TOLL_FREE', 	$_POST['COMPANY_TOLL_FREE']);
	$core->save_config_value('COMPANY_FAX', 		$_POST['COMPANY_FAX']);
	$core->save_config_value('DEFAULTAREACODE', 	$_POST['DEFAULTAREACODE']);
	$core->save_config_value('COMPANY_START_HOUR', 	$_POST['COMPANY_START_HOUR']);
	$core->save_config_value('COMPANY_START_MIN', 	$_POST['COMPANY_START_MIN']);
	$core->save_config_value('COMPANY_END_HOUR', 	$_POST['COMPANY_END_HOUR']);
	$core->save_config_value('COMPANY_END_MIN', 	$_POST['COMPANY_END_MIN']);
	$core->save_config_value('SESSION_TIMEOUT', 	$_POST['SESSION_TIMEOUT']);
    $core->save_config_value('DEFAULT_STATE',       $_POST['COMPANY_STATE']);
    $core->save_config_value('DEFAULT_COUNTRY',     $_POST['COMPANY_COUNTRY']);
    $core->save_config_value('DEFAULT_ZIP',         $_POST['COMPANY_POSTAL_CODE']);
    $core->save_config_value('DEFAULT_CALL_COST', $_POST['DEFAULT_CALL_COST']);
	
	$core->write_config();
	
	$core->force_page(ROOT_URL.'/index.php?page=core:configure_address');
} else {
	
	

	
	
	$smarty->display('core/configure_company_address.tpl');
}

?>