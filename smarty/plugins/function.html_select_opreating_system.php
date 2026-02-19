<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_state} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_state<br>
 * Purpose:  Prints the dropdowns for state selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_opreating_system($params, &$smarty) {

	require_once(CLASS_PATH."/core/operating_system.class.php");
	
	$operating_system = new operating_system();
	
	$operating_system_array = $operating_system->load_by_operating_system_manufacture_id($params['operating_system_manufacture_id']);
	
	$html = "<select name=\"opreating_system_id\" id=\"operating_system_id\">\n";
	
	$html .= "<option value=\"\">Un-known</option>\n";
	
	foreach($operating_system_array as $operating_system){
		

		$html .= "<option value=\"" . $operating_system->get_operating_system_id() . "\" ";
	
		// Setup Slected
		if($operating_system->get_operating_system_id() == $params['value']) {
			$html .= " selected ";
		} 
	
		$html .= ">" . $operating_system->get_operating_system_name() . "</option>\n";
	
	}
	
	$html .= "</select> <input type=\"button\" value=\"+\" onclick=\"add_operating_system()\">\n";
	
	return $html;
	

}

?>
