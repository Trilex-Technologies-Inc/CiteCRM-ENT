<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_modules} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_modules<br>
 * Purpose:  Prints the dropdowns for Modules selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_modules($params, &$smarty) {

	require_once(CLASS_PATH."/core/module.class.php");

	$module = new Module();
	
	$module_array = $module->load_all();
	
	$html = "<select name=\"".$params['name']."[]\" multiple=\"multiple\">\n";
	
	foreach($module_array as $module){
	
		$html .= "<option value=\"".$module->get_module_name()."\"";
		
		if($params['value'] == $module->get_module_name()) {
			$html .= " selected ";
		}
		
		$html .= ">".$module->get_module_name()."</option>\n";
		
		$count++;
	
	}
	
	$html .= "</select>\n";
	
	return $html;

}
