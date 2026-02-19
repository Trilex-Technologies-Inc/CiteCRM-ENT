<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_yesno} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_yesno<br>
 * Purpose:  Prints the dropdowns for yes no selection
 * @link http://www.citesoftware.com
 * @author jaimie garner
 * @credits jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 * 
 */
 function smarty_function_html_select_yesno($params, &$smarty) {
 

 
 	$html = "<select name=\"".$params['fieldName']."\" id=\"".$params['fieldName']."\">\n";
 	
 	$html .= "	<option value=\"0\" ";
 	
 	if($params['value'] == 0) {
 			$html .= " selected ";
 	}
 	
 	$html .= ">No</option>\n";
 	
 	$html .="	<option value=\"1\" ";
 	
 	if($params['value'] == 1) {
 		$html .= " selected ";
 	}
 	
 	$html .= ">Yes</option>\n";
 	
 	$html .= "</select>\n";
 	
 	return $html;
 }