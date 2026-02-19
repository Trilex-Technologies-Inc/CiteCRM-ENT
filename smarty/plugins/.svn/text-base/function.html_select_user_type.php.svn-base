<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_user_type} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_user_type<br>
 * Purpose:  Prints the dropdowns for user type selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_user_type($params, &$smarty) {
	
	require_once(CLASS_PATH.'/core/user_type.class.php');

	$user_type = new user_type();
	
	$user_type_array = $user_type->load_all();


	$html ="<select name=\"".$params['user_type']."\" id=\"".$params['user_type']."\">\n";
	
	$html .="<option value=\"\">Select One</option\n";
	
	foreach($user_type_array as $key => $val) {
		if( $val->get_user_type_id() == '1'){
		}else{
			if( $val->get_user_type_id() != '3'){
				
				
				$html .= "<option value=\"" . $val->get_user_type_id() . "\" ";
				
				// Setup Slected
				if($val->get_user_type_id() == $params['value']) {
					$html .= " selected ";
				} 
				
				$html .= ">" . $val->get_user_type_text() . "</option>\n";
			}
		}	
	}
	
	
	$html .= "</select>\n";


	return $html;
}



?>