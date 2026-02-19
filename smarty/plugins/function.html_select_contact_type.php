<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_contact_type} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_contact_type<br>
 * Purpose:  Prints the dropdowns for contact selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_contact_type($params, &$smarty) {

	$html_result .="<select name=\"contact_type\">\n";
	
	$html_result .="<option value=\"\">Select One</option\n";
	
	
	// Home Phone
	$html_result .="<option value=\"Personal Phone\"  ";

	if($params['contact_type'] == "Personal Phone") {
		$html_result .=" selected ";
	}

	$html_result .=">Personal Phone</option>\n";
	
	// Business Phone
	$html_result .="<option value=\"Business Phone\"  ";

	if($params['contact_type'] == "Business Phone") {
		$html_result .=" selected ";
	}

	$html_result .=">Business Phone</option>\n";


	//	Mobile Phone
	$html_result .="<option value=\"Mobile Phone\"  ";

	if($params['contact_type'] == "Mobile Phone") {
		$html_result .=" selected ";
	}

	$html_result .=">Mobile Phone</option>\n";

	
	// Pager
	$html_result .="<option value=\"Pager\"  ";

	if($params['contact_type'] == "Pager") {
		$html_result .=" selected ";
	}

	$html_result .=">Pager</option>\n";

	// Email
	$html_result .="<option value=\"Email\"  ";

	if($params['contact_type'] == "Email") {
		$html_result .=" selected ";
	}

	$html_result .=">Email</option>\n";

	// Yahoo IM
	$html_result .="<option value=\"Yahoo IM\"  ";

	if($params['contact_type'] == "Yahoo IM") {
		$html_result .=" selected ";
	}

	$html_result .=">Yahoo IM</option>\n";


	// MSN IM
	$html_result .="<option value=\"MSN IM\"  ";

	if($params['contact_type'] == "MSN IM") {
		$html_result .=" selected ";
	}

	$html_result .=">MSN IM</option>\n";
	
	// AOL IM
	$html_result .="<option value=\"AOL IM\"  ";

	if($params['contact_type'] == "AOL IM") {
		$html_result .=" selected ";
	}

	$html_result .=">AOL IM</option>\n";
	
	$html_result .= "</select>\n";


    return $html_result;
}

/* vim: set expandtab: */

?>
