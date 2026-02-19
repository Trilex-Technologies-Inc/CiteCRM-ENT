<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_main_menu.php<br>
 * Purpose:  Admin Main Menu<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

$smarty->caching = false;

require_once(CLASS_PATH."/core/navigation.class.php");

$menuNavObj = new Navigation();

$menu_nav_array = $menuNavObj->load_all_main_menu();

$smarty->assign('menu_nav_array',$menu_nav_array);

$smarty->display('core/admin_main_menu.tpl');

?>