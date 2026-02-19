<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_payment_options} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_payment_options<br>
 * Purpose:  Prints the dropdowns for payment options
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_payment_options($params, &$smarty) {

	require_once(CLASS_PATH.'/core/payment_option.class.php');
		
	$payment_option_obj = new Payment_option();
	
	$payment_option_array = $payment_option_obj->loadActive();
	
	
	
	
	$html .= "<select name=\"".$params['fieldName']."\" onChange=\"select_payment_type()\" id=\"".$params['fieldName']."\">\n";
	
	$html .= "<option value=\"\">Select One</option>\n";
	foreach($payment_option_array as $payment_option){
		

		$html .= "<option value=\"" . $payment_option->get_payment_option_id() . "\" ";
	
		// Setup Slected
		if($payment_option->get_payment_option_id() == $params['value']) {
			$html .= " selected ";
		} 
	
		$html .= ">" . $payment_option->get_payment_option_text() . "</option>\n";
	
	}
	
	$html .= "</select>\n";
	
	return $html;
	

}

?>
