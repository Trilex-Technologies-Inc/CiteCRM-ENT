<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {fetch_main_menu_products} plugin
 *
 * Type:     function<br>
 * Name:     fetch_main_menu_products<br>
 * Purpose:  Fetches products to display in the main Menu<br>
 * 
 * @author jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return Product Object
 * @uses product::loadSpecialsMainMenu
 */


function smarty_function_fetch_main_menu_specials($params, &$smarty) {

	$specials = new product;

	$specials->loadSpecialsMainMenu();

	$smarty->assign($params['assign'],$specials);

}
