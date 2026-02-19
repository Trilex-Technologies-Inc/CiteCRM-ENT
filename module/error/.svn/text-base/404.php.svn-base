<?php
/** 404.php */


$core->pageSetup("error:404");

$core->updatePageView("error:404");

$smarty->assign('core', $core);

// Generate Error
$html = '<table>
	<tr>
		<td><b>Time</b></td>
		<td>'.time().'</td>
	</tr><tr>
		<td><b>Browser</b></td>
 		<td>'.$_SERVER['HTTP_USER_AGENT'].'</td>
	</tr><tr>
		<td><b>Your IP Address</b></td>
		<td>'.$_SERVER['REMOTE_ADDR'].'</td>
	</tr><tr>
		<td><b>Protocal</b></td>
		<td>'.$_SERVER['SERVER_PROTOCOL'].'</td>
	</tr><tr>
		<td><b>Port<b></td>
		<td>'.$_SERVER['SERVER_PORT'].'</td>
	</tr><tr>
		<td><b>Page Requested</b></td>
		<td>'.$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'].'</td>
	</tr>
</table>';


// Mail Admin
$msg 		= '<b>Error 404</b><br>';

$msg 		= $html;

$subject 	= SITE_NAME . " 404 File Not Found Error!";

$mail 		= new mail();	

$mail->mailAdmin($msg,$subject);

// Smarty Assignment
$smarty->assign('errorMsg', $html);

$smarty->assign('requestedPage', $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

$smarty->display('error/404.tpl');


?>