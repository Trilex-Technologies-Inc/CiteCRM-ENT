<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(SUPER_USER);
if(isset($_POST['submit'])){
	

	
	$core->save_config_value('PDF_PRINTING',			$_POST['PDF_PRINTING']);
	$core->save_config_value('DISPLAY_COMPANY_LOGO',	$_POST['DISPLAY_COMPANY_LOGO']);
	$core->save_config_value('SYSTEMLABEL',				$_POST['SYSTEMLABEL']);
	$core->save_config_value('DATE_FORMAT',				$_POST['DATE_FORMAT']);
	$core->save_config_value('DATE_TIME_FORMAT',		$_POST['DATE_TIME_FORMAT']);
	
	
	$core->write_config();
	
	$core->force_page(ROOT_URL.'/index.php?page=core:configure_crm');
} else {
	
	$smarty->display('core/configure_crm.tpl');
}

?>