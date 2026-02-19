<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     update_company.php<br>
 * Purpose:  Update a Single Company row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_EDIT);
	
	require(CLASS_PATH.'/core/company.class.php');

	$company = new company();

	$company->view_company($_REQUEST['company_id']);

// If form Submission
if(isset($_REQUEST['submit']) ) {

	// Conect to smarty validator
	SmartyValidate::connect($smarty);
	
	// If valid Post Disconect and add new company
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();

		$company->update_company($_REQUEST);
			
		$_SESSION['CLEAR_CACHE'] = true;
		
		$core->force_page("index.php?page=company:view_company&company_id=".$_REQUEST['company_id']);
			
	} else {
	
		// error, redraw the form
		$smarty->assign('company',$company);
		
		$smarty->display('company/update_company_frm.tpl');
		
		}
} else {

	// Display the Form
	SmartyValidate::connect($smarty, true);
	
	SmartyValidate::register_form('update_company_frm');
	
	$smarty->assign('company',$company);
	
	$smarty->display('company/update_company_frm.tpl');
}
?>