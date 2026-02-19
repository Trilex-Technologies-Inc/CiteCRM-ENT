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
function smarty_function_html_select_system_manufacture($params, &$smarty) {



	require_once(CLASS_PATH."/core/system_manufacture.class.php");
	
	$system_manufacture = new system_manufacture();
	
	
	$system_manufacture_array = $system_manufacture->load_all();
	
	

	$html .= "<select name=\"system_manufacture_id\" id=\"system_manufacture_id\">\n";
	
	$html .= "<option value=\"\">Select Manufacture</option>\n";
	
	foreach($system_manufacture_array as $system_manufacture) {
	
		$html .= "<option value=\"" . $system_manufacture->get_system_manufacture_id() . "\" ";
		
		// Setup Slected
		if($system_manufacture->get_system_manufacture_id() == $params['value']) {
			$html .= " selected ";
		} 
		
		
		$html .= ">" . $system_manufacture->get_manufacture_name() . "</option>\n";
		
	
	}
	
	
	$html .= "</select>\n";
	
	return $html;
	
	


}

?>