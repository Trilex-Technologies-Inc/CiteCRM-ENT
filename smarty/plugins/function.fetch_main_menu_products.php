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
 * Purpose:  Fetches product specials to display in the main Menu<br>
 * 
 * @author jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return Product Object
 * @uses product::loadForMainMenu()
 */


function smarty_function_fetch_main_menu_products($params, &$smarty) {
	
	$product = new product;

	$menuProduct = $product->loadForMainMenu();

	$smarty->assign($params['assign'],$menuProduct);

}
