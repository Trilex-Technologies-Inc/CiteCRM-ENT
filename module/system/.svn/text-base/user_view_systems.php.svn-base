<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     user_view_systems.php<br>
 * Purpose:  View users systems<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

require_once(CLASS_PATH.'/core/system.class.php');

$system = new System();

$user_id = $_SESSION['SESSION_USER_ID'];

$system_array	= $system->load_by_user_id($user_id);

$smarty->assign('system_array', $system_array);

$smarty->display('system/user_view_systems.tpl');
?>