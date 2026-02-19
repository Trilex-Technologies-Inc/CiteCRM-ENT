<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_campaign.php<br>
	* Purpose:  Update a Single Campaign row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/campaign.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new campaign
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$campaign = new campaign();
			$campaign->update_campaign($_REQUEST);
			$core->force_page("index.php?page=campaign:view_campaign&campaign_id=".$_REQUEST['campaign_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('campaign/update_campaign_frm.tpl');
		}
} else {
	// Display the Form

$campaign = new campaign();
$campaign->view_campaign($_REQUEST['campaign_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_campaign_frm');

$smarty->assign('campaign',$campaign);
$smarty->display('campaign/update_campaign_frm.tpl');
}
?>