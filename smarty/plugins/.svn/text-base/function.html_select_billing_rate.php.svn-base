<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_billing_rate} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_billing_rate<br>
 * Purpose:  Prints the dropdowns for Billing Rate selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_billing_rate($params, &$smarty) {

	require_once(CLASS_PATH."/core/billing_rates.class.php");
	
	$billing_rate = new billing_rates();
	
	$billing_rate_array = $billing_rate->loadAll();
	
	
	
	$html = '<select name="billing_rate" id="'.$params['id'].'">';
	
	foreach($billing_rate_array as $billing) {
	
		
	
	
		$html .= '<option value="' . $billing->get_billing_rate_amount() . '"';
		
		if($params['rate'] == $billing->get_billing_rate_amount()){
			$html .= ' selected ';
		}
		
		$html .= '>$'.sprintf("%01.2f",$billing->get_billing_rate_amount()).' '.$billing->get_billing_rate_text() .'</option>';
		
		
	}
	
	$html .='</select>';
	
	return $html;



}
