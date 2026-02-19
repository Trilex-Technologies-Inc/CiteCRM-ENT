<?php

/**
 * @author 
 * @copyright 2007
 */

require(CLASS_PATH.'/core/credit_card.class.php');
$credit_card = new credit_card();
$credit_cardArray = $credit_card->search_credit_card();
$smarty->assign('credit_cardArray', $credit_cardArray);
$smarty->display('credit_card/ajax_load_credit_card.tpl');

?>