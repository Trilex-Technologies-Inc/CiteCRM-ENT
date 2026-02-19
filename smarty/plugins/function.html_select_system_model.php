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
function smarty_function_html_select_system_model($params, &$smarty) {


	require_once(CLASS_PATH."/core/system_model.class.php");
	
	$system_model = new system_model();
	
	$system_model_array = $system_model->load_by_system_manufacture_id($params['system_manufacture_id']);
	
	
	
	$html = "<select name=\"system_model_id\">\n";
	
		$html .= "<option value=\"\">Un-known</option>\n";
	
	
		foreach($system_model_array as $system_model) {
		
		
			$html .= "<option value=\"" . $system_model->get_system_model_id() . "\" ";
			
			// Setup Slected
			if($system_model->get_system_model_id() == $params['value']) {
				$html .= " selected ";
			} 
			
			if($params['code_only'] == true) {
				$html .= ">" . $system_model->get_system_model_name() . "</option>\n";
			} else {
				
				$html .= ">" . $system_model->get_system_full_name() . "</option>\n";
			}	
		
	
		
	}
	
	$html .= "</select>\n";
	
	return $html;
	
	


}

?>