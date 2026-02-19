<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_credit_card.php<br>
* Purpose:  delete a Single Credit Cards row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/credit_card.class.php');


$credit_card = new credit_card();

$credit_card->delete_credit_card($_REQUEST['credit_card_id']);

$smarty->display('credit_card/delete_credit_card.tpl')

?>