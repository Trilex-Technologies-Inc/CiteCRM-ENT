<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_company_system} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_company_system<br>
 * Purpose:  Prints the dropdowns for company system selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_company_system($params, &$smarty) {


	require_once(CLASS_PATH."/core/system.class.php");
	
	$system = new system();
	
	$system_array = $system->load_by_company_id($params['company_id'],'system_id','ASC','0','0',&$total);
	
	if(empty($params['fieldName'])) {
		$params['fieldName'] = "system_id";
	}
	
	$html = "<select name=\"".$params['fieldName']."\" id=\"".$params['fieldName']."\">\n";
	
		$html .= "<option value=\"\">Un-known</option>\n";
	
	
		foreach($system_array as $system) {
		
		
			$html .= "<option value=\"" . $system->get_system_id(). "\" ";
			
			// Setup Slected
			if($system->get_system_id() == $params['value']) {
				$html .= " selected ";
			} 
			
				
				$html .= ">" . $system->get_system_name() . "</option>\n";
			}	
		

	
	$html .= "</select>\n";
	
	return $html;
	
	


}

?>