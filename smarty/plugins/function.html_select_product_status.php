<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_product_status} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_product_status<br>
 * Purpose:  Prints the dropdowns for product status selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_product_status($params, &$smarty) {

	require_once(CLASS_PATH."/core/product_status.class.php");
	
	$product_status = New Product_Status();
	
	$product_statusArray = $product_status->loadAll();
	
	
	$html ="<select name=\"".$params['fieldName']."\">";
	
	$html .= "<option value=\"\">Select One</option>";
	
	foreach ($product_statusArray as $status) {
	
		$html .= "<option value=\"".$status->get_product_status_id()."\" ";
		
		if($params['value'] == $status->get_product_status_id()) {
		$html .= " selected ";
	}


	$html .= " >".$status->get_product_status_text()."</option>";

	
		
	}

	$html .= "</select>";
	
	
	return $html;
}

	
	

?>