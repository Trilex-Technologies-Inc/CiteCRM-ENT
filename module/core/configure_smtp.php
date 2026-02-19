<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(SUPER_USER);
$error = false;
$errorMsg = '';

if(isset($_POST['submit'])){
	$smtp_server	= $_POST['smtp_server'];
	$smtp_user		= $_POST['smtp_user'];
	$smtp_password	= $_POST['smtp_password'];
	$email_from		= $_POST['email_from'];
	$reply_to		= $_POST['reply_to'];
	
	$core->save_config_value('COMPANY_SMTP_SERVER',$smtp_server);
	$core->save_config_value('COMPANY_SMTP_USER',$smtp_user);
	$core->save_config_value('COMPANY_SMTP_PASSWORD',$smtp_password);
	$core->save_config_value('COMPANY_SMTP_FROM',$email_from);
	$core->save_config_value('COMPANY_SMTP_REPLY',$reply_to);
	
	$core->write_config();
	
	$core->force_page(ROOT_URL."/index.php?page=core:configure_smtp");
	
	
} else {
	$configureArray = $core->load_configure();
	
	foreach($configureArray as $configure){
		if($configure->fields['configure_name'] == 'COMPANY_SMTP_SERVER'){
			$smtp_server = $configure->fields['configure_value'];
		}
		if($configure->fields['configure_name'] == 'COMPANY_SMTP_USER'){
			$smtp_user = $configure->fields['configure_value'];
		}
		if($configure->fields['configure_name'] == 'COMPANY_SMTP_PASSWORD'){
			$smtp_password = $configure->fields['configure_value'];
		}
		if($configure->fields['configure_name'] == 'COMPANY_SMTP_FROM'){
			$email_from = $configure->fields['configure_value'];
		}
		if($configure->fields['configure_name'] == 'COMPANY_SMTP_REPLY'){
			$reply_to = $configure->fields['configure_value'];
		}		
	}
	
	$smarty->assign('smtp_server',$smtp_server);
	$smarty->assign('smtp_user',$smtp_user);
	$smarty->assign('smtp_password',$smtp_password);
	$smarty->assign('email_from',$email_from);
	$smarty->assign('reply_to',$reply_to);
	
	$smarty->display('core/configure_smtp.tpl');
}

?>