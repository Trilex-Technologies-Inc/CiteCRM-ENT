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

require_once(CLASS_PATH."/core/navigation.class.php");

$smarty->caching = false;


if(isset($_POST['submit'])) {

    $page_setup_id = $_POST['page_setup_id'];


    $navigationObj = new Navigation();

    $navigationObj->add_page_to_menu($page_setup_id);

    $core->force_page('index.php?page=core:admin_main_menu');

} else {


    $smarty->display('core/admin_add_to_main_menu.tpl');

}
?>