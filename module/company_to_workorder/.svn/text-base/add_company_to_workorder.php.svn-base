<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_company_to_workorder.php<br>
	* Purpose:  Add New Company To Work Order<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/company_to_workorder.class.php');

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new company_to_workorder
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$company_to_workorder = new company_to_workorder();
			$company_to_workorder_id = $company_to_workorder->add_company_to_workorder($_REQUEST);
			$core->force_page("index.php?page=company_to_workorder:view_company_to_workorder&company_to_workorder_id=".$company_to_workorder_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('company_to_workorder/add_company_to_workorder_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_company_to_workorder_frm');
	SmartyValidate::register_validator('company_id',	'company_id', 'notEmpty');
	SmartyValidate::register_validator('workorder_id',	'workorder_id', 'notEmpty');
	$smarty->display('company_to_workorder/add_company_to_workorder_frm.tpl');
}
?>