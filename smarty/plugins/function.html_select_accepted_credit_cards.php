<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_accepted_credit_cards} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_accepted_credit_cards<br>
 * Purpose:  Prints the dropdowns for Accepted Credit Cards selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_select_accepted_credit_cards($params, &$smarty) {

	require_once(CLASS_PATH."/core/credit_card.class.php");

	$credit_card_Obj = new Credit_Card();

	$credit_card_array = $credit_card_Obj->load_all_active();


	$html = '<select name="cc_card_type" id="cc_card_type">';

	
	foreach($credit_card_array as $credit_card) {


		$html .= '<option value="' . $credit_card->get_credit_card_type() . '"';
		
		if($params['cc_card_type'] == $credit_card->get_credit_card_type()){
			$html .= ' selected ';
		}
		
		$html .= '>'. $credit_card->get_credit_card_name()  .'</option>';
				
	}
	
	$html .='</select>';
	
	return $html;

	

}
