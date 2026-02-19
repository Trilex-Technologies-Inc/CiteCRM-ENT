<?php
/** 
 * Type:     Cite CMS Core Class<br>
 * Name:    error<br>
 * Purpose:  For all error handeling<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class error {

	function fileNotFound() {
		$the_page = MODULE_PATH."/error/404.php";
		
		return $the_page;
		
	}
	
	function accessDeniedError() {
		global $core;
	
		$core->force_page('index.php?page=error:403');
		
		exit;
	}
	
	function dbError($error,$q) {
	
	
		global $smarty;
		
		$errorMsg = $error;
		
		$smarty->assign('errorMsg', $errorMsg);
	
		$smarty->assign('sql', $sql);
	
		$smarty->display('error/dbError.tpl');
		
		$msg = "There was a Database Error executing: $q\n The Database Server said: $error\n";
		
		$subject = "Database Error for " . SITE_NAME;
		
		$mail = new mail();
		
		$mail->mailAdmin($msg,$subject);
		
		exit;
							
	}


	function coreError($error) {
		
		global $smarty;
		
		$errorMsg = $error;

		$smarty->assign('errorMsg', $errorMsg);
	
		$smarty->display('error/coreError.tpl');

		$msg = "There was a server Error: $error\n";
		
		$subject = "Server Error for " . SITE_NAME;
		
		$mail = new mail();
		
		$mail->mailAdmin($msg,$subject);
		
		exit;

	}
}

?>