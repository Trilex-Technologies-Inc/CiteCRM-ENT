<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_personal.php<br>
 * Purpose:  Loads a users personal information<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin();

require(CLASS_PATH."/core/user.class.php");

$userObj = new user();

$userObj->loadUserByID($_SESSION['SESSION_USER_ID']);

$smarty->assign('userObj', $userObj);

$smarty->display('user/ajax_load_personal.tpl');
?>