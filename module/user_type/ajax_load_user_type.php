<?php

/**
 * @author 
 * @copyright 2007
 */
$core->verifyAdmin(SUPER_USER);
require_once(CLASS_PATH.'/core/user_type.class.php');
$user_type = new user_type();
$user_typeArray = $user_type->search_user_type();
$smarty->assign('user_typeArray', $user_typeArray);
$smarty->display('user_type/ajax_load_user_type.tpl');

?>