<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_lead_email.php<br>
	* Purpose:  Update a Single Lead Email row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/lead_email.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new lead_email
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$lead_email = new lead_email();
			$lead_email->update_lead_email($_REQUEST);
			$core->force_page("index.php?page=lead_email:view_lead_email&lead_email_id=".$_REQUEST['lead_email_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('lead_email/update_lead_email_frm.tpl');
		}
} else {
	// Display the Form

$lead_email = new lead_email();
$lead_email->view_lead_email($_REQUEST['lead_email_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_lead_email_frm');

$smarty->assign('lead_email',$lead_email);
$smarty->display('lead_email/update_lead_email_frm.tpl');
}
?>