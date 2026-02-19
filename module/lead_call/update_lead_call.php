<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_lead_call.php<br>
	* Purpose:  Update a Single Lead Call row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/lead_call.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new lead_call
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$lead_call = new lead_call();
			$lead_call->update_lead_call($_REQUEST);
			$core->force_page("index.php?page=lead_call:view_lead_call&lead_call_id=".$_REQUEST['lead_call_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('lead_call/update_lead_call_frm.tpl');
		}
} else {
	// Display the Form

$lead_call = new lead_call();
$lead_call->view_lead_call($_REQUEST['lead_call_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_lead_call_frm');

$smarty->assign('lead_call',$lead_call);
$smarty->display('lead_call/update_lead_call_frm.tpl');
}
?>