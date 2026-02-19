<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_function_html_select_company_task($params, &$smarty) {


	require_once(CLASS_PATH."/core/company_task.class.php");
	$taskObj = new company_task();
	
	$category_array = $taskObj->load_company_task_category();
	
	$html = "<select name=\"company_task_category\" id=\"company_task_category\">";
	$html .="<option value=\"\">".$taskObj->translate['text_none']."</option>";
	foreach($category_array as $category){
		$html .="<option value=\"".$category->fields['company_task_category_id']."\" ";
		
		if($params['value'] == $category->fields['company_task_category_id']){
			$html .= "selected";
		}
		
		$html .=">".$category->fields['company_task_category_name']."</option>";
		
		
	}
	
	
	
	return $html;
	


}

?>