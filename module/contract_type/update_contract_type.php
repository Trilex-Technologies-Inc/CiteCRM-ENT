<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_contract_type.php<br>
* Purpose:  Update a Single Contract Type row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);
	require(CLASS_PATH.'/core/contract_type.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new contract_type
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$contract_type = new contract_type();
			$contract_type->update_contract_type($_REQUEST);
			$core->force_page("index.php?page=contract_type:view_contract_type&contract_type_id=".$_REQUEST['contract_type_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('contract_type/update_contract_type_frm.tpl');
		}
} else {
	// Display the Form

$contract_type = new contract_type();
$contract_type->view_contract_type($_REQUEST['contract_type_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_contract_type_frm');

$smarty->assign('contract_type',$contract_type);
$smarty->display('contract_type/update_contract_type_frm.tpl');
}
?>