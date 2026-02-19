<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {function_html_select_plugins} function plugin
 *
 * Type:     function<br>
 * Name:     function_html_select_plugins<br>
 * Purpose:  Prints the dropdowns for Smarty Plugins selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_plugins($params, &$smarty) {

	if ($handle = opendir(SMARTY_PATH."/plugins")) {
	
		$html = "<select name=\"functions[]\" multiple=\"multiple\">\n";
	
		 while (false !== ($function = readdir($handle))) {
		 
		 	if($function != "." && $function != "..") {
			
				$pieces = explode(".", $function);
				
				
				if($pieces[0] == "function") {
				
					$html .="<option value=\"$function\">".$pieces[1]."</option>\n";
				
				}
				
		 	}
	
	
		}
	
	}
	closedir($handle);
	
	$html .= "</select>\n";
	
	return $html;

}
