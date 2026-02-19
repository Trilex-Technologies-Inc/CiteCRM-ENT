<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_credit_card.php<br>
* Purpose:  Search Credit Cards<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);
$smarty->display('credit_card/search_credit_card.tpl');
?>