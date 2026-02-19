<?php
/**
 * Smarty plugin
 * @package MovieAmp
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
function smarty_function_html_select_state($params, &$smarty) {


	require_once(CLASS_PATH."/core/state.class.php");
	
	$state = new State();
	
	$state_array = $state->load_by_county_id($params['country_id']);
	
	$html = "<select name=\"".$params['name']."\" id=\"".$params['name']."\">\n";
	
	
	if(empty($state_array)) {
		$html .= "<option value=\"\">Select Country First</option>\n";
	} else {
	
	
		foreach($state_array as $key => $val) {
		
			$html .= "<option value=\"" . $val->get_state_id() . "\" ";
			
			// Setup Slected
			if($val->get_state_id() == $params['value']) {
				$html .= " selected ";
			} 
			
			if($params['code_only'] == true) {
				$html .= ">" . $val->get_state_code() . "</option>\n";
			} else {
				$html .= ">" . $val->get_state_text() . "</option>\n";
			}	
		
		}
		
	}
	
	$html .= "</select>\n";
	
	return $html;
	
	


}

?>