<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_user_type.php<br>
* Purpose:  View a Single User Type row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/user_type.class.php');

$user_type = new user_type();

$user_type->view_user_type($_REQUEST['user_type_id']);

$smarty->assign('user_type', $user_type);

$smarty->display('user_type/view_user_type.tpl');

?>