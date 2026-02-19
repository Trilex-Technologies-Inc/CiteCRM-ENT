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
function smarty_function_html_select_product_category($params, &$smarty) {


	require_once(CLASS_PATH."/core/category.class.php");
	
	$categoryObj = New Category();
	
	$catgoryArray = $categoryObj->loadAll();
	
	$html ="<select name=\"".$params['fieldName']."\">\n";
	
	foreach ($catgoryArray as $category) {
		$html .= "<option value=\"".$category->fields['child_id']."\" ";
		
		if($params['value'] == $category->fields['child_id']) {
			$html .= " selected ";
		}
		
		$html .= ">".$category->fields['parent_name']." :: ".$category->fields['child_name']."</option>\n";
		
	
	}
	
	
	$html .= "</select>\n";
	
	return $html;
	
	


}

?>