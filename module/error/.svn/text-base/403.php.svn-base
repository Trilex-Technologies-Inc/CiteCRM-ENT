<?php
/** 404.php */


// Generate Error
$html = "<p>403: Access forbidden! :  You don&#039;t have permission to access <b>{$requestedPage}</b>.</p>\n";

$html .="User Agent: " . $_SERVER['HTTP_USER_AGENT'] . " <br>\n";
$html .="Cookie:		 " . $_SERVER['HTTP_COOKIE'] . "<br>\n";
$html .="Address:	    " . $_SERVER['REMOTE_ADDR'] . "<br>\n";




// Mail Admin
$msg 		= '<b>Error 403</b><br>';

$msg 		= $html;

$subject 	= SITE_NAME . " 403 Access forbidden!";

$mail 		= new mail();	

$mail->mailAdmin($msg,$subject);

// Smarty Assignment
$smarty->assign('errorMsg', $html);

$smarty->assign('requestedPage', $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

$smarty->display('error/403.tpl');


?>