<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_address.php<br>
 * Purpose:  Loads a users personal information<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin();

require(CLASS_PATH."/core/user_address.class.php");

$user_addressObj = new user_address();

$user_address_array = $user_addressObj->loadAddressByUserID($_SESSION['SESSION_USER_ID']);

$smarty->assign('user_address_array', $user_address_array);

$smarty->display('user/ajax_load_address.tpl');
?>