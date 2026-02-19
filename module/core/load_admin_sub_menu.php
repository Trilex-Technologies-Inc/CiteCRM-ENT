<?php
require_once(CLASS_PATH.'/core/module_method.class.php');

$smarty->caching = false;

$my_cache_id = $_REQUEST['module_id'];

if(!$smarty->is_cached('core/admin_sub_menu.tpl',$my_cache_id)) {

   $module_method = new Module_method();

	$module_method_array = $module_method->load_methods_for_menu($_REQUEST['module_id']);

	$smarty->assign('module_method_array', $module_method_array);
}

$smarty->display('core/admin_sub_menu.tpl',$my_cache_id);













?>