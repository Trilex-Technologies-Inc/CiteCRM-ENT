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

$core->verifyAdmin();

$smarty->caching = false;

require_once(CLASS_PATH."/core/navigation.class.php");

$navigationObj = new Navigation();

$pagArray = $navigationObj->load_all_pages();

$smarty->assign('pagArray', $pagArray);

$smarty->display('core/admin_view_pages.tpl');
?>