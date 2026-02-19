<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_edit_main_menu.php<br>
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

 

if(isset($_POST['submit'])) {
    
    $page_setup_id              = $_POST['page_setup_id'];
    $page_setup_display_name    = $_POST['page_setup_display_name'];
    $page_setup_page_title      = $_POST['page_setup_page_title'];
    $page_setup_order           = $_POST['page_setup_order'];
    $page_setup_active          = $_POST['page_setup_active'];
    $page_setup_menu            = $_POST['page_setup_menu'];
    $page_setup_description     = $_POST['page_setup_description'];
    $page_setup_keywords        = $_POST['page_setup_keywords'];

    $menuNavObj->update_main_menu($page_setup_id,$page_setup_display_name,$page_setup_page_title,$page_setup_order,$page_setup_active,$page_setup_menu,$page_setup_description,$page_setup_keywords);

    $core->force_page("index.php?page=core:admin_edit_main_menu&page_id=$page_setup_id");

} else {

    $page_id = $_GET['page_id'];

    $menuNavObj->load_page_by_id($page_id);
    
    $smarty->assign('menuNavObj',$menuNavObj);

    $smarty->display('core/admin_edit_main_menu.tpl');
}
?>