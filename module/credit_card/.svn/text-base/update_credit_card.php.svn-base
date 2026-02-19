<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_credit_card.php<br>
* Purpose:  Update a Single Credit Cards row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/credit_card.class.php');

$credit_card = new credit_card();

$credit_card_active	= $_POST['credit_card_active'];
$credit_card_id 	= $_POST['credit_card_id'];

$credit_card->update_credit_card($credit_card_id,$credit_card_active);


		
?>