<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_lead_email.php<br>
	* Purpose:  Add New Lead Email<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
echo "here";

require(CLASS_PATH.'/core/lead_email.class.php');
$lead_email = new lead_email();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new lead_email
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$lead_email_id = $lead_email->add_lead_email($_REQUEST);
			$core->force_page("index.php?page=lead_email:view_lead_email&lead_email_id=".$lead_email_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('lead_email/add_lead_email_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_lead_email_frm');
	$smarty->display('lead_email/add_lead_email_frm.tpl');
}
?>