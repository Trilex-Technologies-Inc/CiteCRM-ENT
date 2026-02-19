<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_project_status} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_project_status<br>
 * Purpose:  Prints the dropdowns for project status selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_project_status($params, &$smarty) {

	require(CLASS_PATH."/core/project_status.class.php");
	
	$project_status = new project_status();
	
	$project_status_array = $project_status->load_in_array();
	
	$html = "<select name=\"project_status_id\" id=\"project_status_id\">\n";
	
	//Loop through the Array	
	foreach($project_status_array as $key => $val) {
	
		$html .= "<option value=\"" . $val->get_project_status_id() . "\" ";
		
		// Setup Slected
		if($val->get_project_status_id() == $params['project_status_id']) {
			$html .= " selected ";
		}
		
		$html .= ">" . $val->get_project_status_name() . "</option>\n";
	
	}

	$html .= "</select>\n";
	
	return $html;

}