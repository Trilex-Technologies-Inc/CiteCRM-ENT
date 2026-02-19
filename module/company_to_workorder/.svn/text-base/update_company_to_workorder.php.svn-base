<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_company_to_workorder.php<br>
	* Purpose:  Update a Single Company To Work Order row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/company_to_workorder.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new company_to_workorder
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$company_to_workorder = new company_to_workorder();
			$company_to_workorder->update_company_to_workorder($_REQUEST);
			$core->force_page("index.php?page=company_to_workorder:view_company_to_workorder&company_to_workorder_id=".$_REQUEST['company_to_workorder_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('company_to_workorder/update_company_to_workorder_frm.tpl');
		}
} else {
	// Display the Form

$company_to_workorder = new company_to_workorder();
$company_to_workorder->view_company_to_workorder($_REQUEST['company_to_workorder_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_company_to_workorder_frm');
	SmartyValidate::register_validator('company_id',	'company_id', 'notEmpty');
	SmartyValidate::register_validator('workorder_id',	'workorder_id', 'notEmpty');

$smarty->assign('company_to_workorder',$company_to_workorder);
$smarty->display('company_to_workorder/update_company_to_workorder_frm.tpl');
}
?>