<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty   country_name modifier plugin
 *
 * Type:     modifier<br>
 * Name:     country_name<br>
 * Purpose:  convert country_id to String
 * @link 
 * @author   jaimie@citesoftware.com
 * @param string
 * @return string
 */
function smarty_modifier_country_name($string) {

	require_once(CLASS_PATH."/core/country.class.php");
	
	$country = new Country();
	
	$country->view_country($string);
	
	$string = $country->get_country_text();
	
	return $string;


}