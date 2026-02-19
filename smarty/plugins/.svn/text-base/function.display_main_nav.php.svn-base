<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {display_main_nav} plugin
 *
 * Type:     function<br>
 * Name:     display_main_nav<br>
 * Purpose:  displays the main navigation<br>
 * 
 * @author jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string header htm including meta tags
 *
 */


function smarty_function_display_main_nav($params, &$smarty) {

	require_once(CLASS_PATH."/core/navigation.class.php");
	
	$nav = new Navigation();
	
	$menuNav = $nav->getMainNavMenu();
	
	$smarty->assign($params['assign'],$menuNav);
	

}

?>