<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_address_type} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_address_type<br>
 * Purpose:  Prints the dropdowns for address selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_address_type($params, &$smarty) {

	if($params['name'] == "") {
		$params['name'] = "address_type";
	}

	$html_result .="<select name=\"".$params['name']."\">\n";
	
	$html_result .="<option value=\"\">Select One</option\n";
	
	
	// Home
	$html_result .="<option value=\"Home\"  ";

	if($params['address_type'] == "Home") {
		$html_result .=" selected ";
	}

	$html_result .=">Home</option>\n";
	
	// Business
	$html_result .="<option value=\"Business\"  ";

	if($params['address_type'] == "Business") {
		$html_result .=" selected ";
	}

	$html_result .=">Business</option>\n";


	//	Billing
	$html_result .="<option value=\"Billing\"  ";

	if($params['address_type'] == "Billing") {
		$html_result .=" selected ";
	}

	$html_result .=">Billing</option>\n";

	
	// Shipping	
	$html_result .="<option value=\"Shipping\"  ";

	if($params['address_type'] == "Shipping") {
		$html_result .=" selected ";
	}

	$html_result .=">Shipping</option>\n";


	$html_result .= "</select>\n";


    return $html_result;
}

/* vim: set expandtab: */

?>
