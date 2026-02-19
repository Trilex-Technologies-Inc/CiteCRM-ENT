<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Include the {@link shared.make_timestamp.php} plugin
 */
require_once $smarty->_get_plugin_filepath('shared','make_timestamp');
/**
 * Smarty date_format modifier plugin
 *
 * Type:     modifier<br>
 * Name:     date_format<br>
 * Purpose:  format datestamps via strftime<br>
 * Input:<br>
 *         - string: input date string
 *         - format: strftime format for output
 *         - default_date: default date if $string is empty
 * @link http://smarty.php.net/manual/en/language.modifier.date.format.php
 *          date_format (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @param string
 * @return string|void
 * @uses smarty_make_timestamp()
 */
function smarty_modifier_link_date_time($string, $default_date=null) {

	

    $dateText =  date("H",$string).":".date("i",$string)." " .date("m",$string)."-".date("d",$string)."-".date("Y",$string);
		
   

	$month	= date("m", $string);
	$day 	= date("d", $string);
	$year	= date("Y", $string);

	$url = "<a href=\"".ROOT_URL."/index.php?page=calendar:view_month&year=$year&month=$month&day=$day\" style=\" text-decoration: none;\">$dateText</a>";

	return $url;
}

/* vim: set expandtab: */

?>
