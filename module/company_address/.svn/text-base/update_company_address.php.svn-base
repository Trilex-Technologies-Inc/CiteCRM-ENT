<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     update_company_address.php<br>
 * Purpose:  Update a Single Company Address row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/



	$core->verifyAdmin();
	
	require(CLASS_PATH.'/core/company_address.class.php');

	$company_address = new company_address();


// If form Submission
if(isset($_REQUEST['submit']) ) {

	// Conect to smarty validator
	SmartyValidate::connect($smarty);
	
	// If valid Post Disconect and add new company_address
	if(SmartyValidate::is_valid($_POST)) {
	
		SmartyValidate::disconnect();
			
		$company_address->update_company_address($_REQUEST);
			
		$_SESSION['CLEAR_CACHE'] = true;
			
		$core->force_page("index.php?page=company:view_company&company_id=".$_REQUEST['company_id']);
		
	} else {
	
	// error, redraw the form
			
			$company_address->view_company_address($_REQUEST['company_address_id']);
			
			$smarty->assign('company_address',$company_address);
			
			$smarty->display('company_address/update_company_address_frm.tpl');
	}
	
} else {

	// Display the Form
	
	$company_address->view_company_address($_REQUEST['company_address_id']);

	SmartyValidate::connect($smarty, true);
	
	SmartyValidate::register_form('update_company_address_frm');

	$smarty->assign('company_address',$company_address);
	
	$smarty->display('company_address/update_company_address_frm.tpl');
}
?>