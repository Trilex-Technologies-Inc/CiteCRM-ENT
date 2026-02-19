<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     add_credit_card.php<br>
* Purpose:  Add New Credit Cards<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/credit_card.class.php');

$credit_card = new credit_card();


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new credit_card
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$credit_card_id = $credit_card->add_credit_card($_REQUEST);
			$core->force_page("index.php?page=credit_card:view_credit_card&credit_card_id=".$credit_card_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('credit_card/add_credit_card_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_credit_card_frm');
	$smarty->display('credit_card/add_credit_card_frm.tpl');
}
?>