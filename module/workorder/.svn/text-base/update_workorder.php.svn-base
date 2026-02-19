<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_workorder.php<br>
* Purpose:  Update a Single Work Order row<br>
* 
* @author Cite CMS Module Developer
* @access Public* @version 1.0
*/

$core->verifyAdmin(CAN_CREATE);
	
	require(CLASS_PATH.'/core/workorder.class.php');
	require(CLASS_PATH.'/core/company.class.php');

// If form Submission
if(isset($_REQUEST['submit']) ) {

	// Conect to smarty validator
	SmartyValidate::connect($smarty);
	
	// If valid Post Disconect and add new workorder
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
		
		$workorder = new workorder();
		
		$workorder->update_workorder($_REQUEST);
		
		$core->force_page("index.php?page=workorder:view_workorder&workorder_id=".$_REQUEST['workorder_id']);
	
	} else {
	
			// error, redraw the form
			
			$workorder = new workorder();
	
			$workorder->view_workorder($_REQUEST['workorder_id']);

			$smarty->assign('workorder',$workorder);
			
			$smarty->display('workorder/update_workorder_frm.tpl');
		}
		
} else {
	// Display the Form

	$workorder = new workorder();
	
	$company		= new Company();
	
	
	$workorder->view_workorder($_REQUEST['workorder_id']);
	
	$company->load_company_by_workorder($_REQUEST['workorder_id']);
	

	SmartyValidate::connect($smarty, true);
	
	SmartyValidate::register_form('update_workorder_frm');


	$smarty->assign('workorder',$workorder);
		
	$smarty->assign('company', $company);
		
	$smarty->display('workorder/update_workorder_frm.tpl');
	
}
?>