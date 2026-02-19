<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_user_type} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_user_type<br>
 * Purpose:  Prints the dropdowns for user type selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_user_status($params, &$smarty) {
	


	$html ="<select name=\"".$params['user_status']."\" id=\"".$params['user_status']."\">\n";
	
	$html .="<option value=\"\">Select One</option\n";
	
	$html .="<option value=\"Active\">Active</option\n";
	$html .="<option value=\"Pending\">Pending</option\n";
	$html .="<option value=\"Suspended\">Suspended</option\n";
	$html .="<option value=\"Closed\">Closed</option\n";
	
	$html .= "</select>\n";


	return $html;
}



?>