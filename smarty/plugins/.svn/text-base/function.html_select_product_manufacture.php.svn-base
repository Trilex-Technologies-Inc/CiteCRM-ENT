<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_product_manufacture} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_product_manufacture<br>
 * Purpose:  Prints the dropdowns for product manufatures selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_product_manufacture($params, &$smarty) {

	require_once(CLASS_PATH."/core/manufacture.class.php");
	
	$manufacture = new manufacture();
	
	$manufactureArray = $manufacture->loadAll();
	
	$html = "<select name=\"".$params['fieldName']."\">\n";
	
	$html .= "<option value=\"\">Select One</option>\n";
	
	foreach($manufactureArray as $manufacture) {
	
		$html .= "<option value=\"".$manufacture->get_manufacture_id()."\" ";
	
		if($manufacture->get_manufacture_id() == $params['value']) {		
			$html .=" selected ";		
		}
	
		$html .=">".$manufacture->get_manufacture_name()."</option>\n";
	
	
	}
	
	
	
	$html .= "</select>\n";
	
	return $html;
	
	

}