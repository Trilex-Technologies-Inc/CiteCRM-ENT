<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_lead_call.php<br>
	* Purpose:  Add New Lead Call<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/lead_call.class.php');
$lead_call = new lead_call();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new lead_call
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$lead_call_id = $lead_call->add_lead_call($_REQUEST);
			$core->force_page("index.php?page=lead_call:view_lead_call&lead_call_id=".$lead_call_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('lead_call/add_lead_call_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_lead_call_frm');
	$smarty->display('lead_call/add_lead_call_frm.tpl');
}
?>