<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_campaign.php<br>
	* Purpose:  Add New Campaign<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/campaign.class.php');
$campaign = new campaign();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new campaign
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();



			
			$campaign_name			= $_POST['campaign_name'];
			$campaign_cost			= $_POST['campaign_cost'];
			$campaign_description	= $_POST['campaign_description'];
			$campaign_active		= $_POST['campaign_active'];

			$startMonth				= $_POST['startMonth'];
			$startDay				= $_POST['startDay'];
			$startYear				= $_POST['startYear'];
			$endMonth				= $_POST['endMonth'];
			$endDay					= $_POST['endDay'];
			$endYear				= $_POST['endYear'];

			$campaign_start_date 	= mktime(0,0,0,$startMonth,$startDay,$startYear);
			$campaign_end_date		= mktime(0,0,0,$endMonth,$endDay,$endYear);

			if(isset($_POST['add_campaign_type'])){
				require_once(CLASS_PATH."/core/campaign_type.class.php");
				$typeObj = new campaign_type();
				$campaign_type_text = $_POST['campaign_type_text'];
				$campaign_type_active = 1;
				$campaign_type_id = $typeObj->add_campaign_type($campaign_type_text,$campaign_type_active);
			} else {
				$campaign_type_id = $_POST['campaign_type_id'];
			}


			$campaign_id = $campaign->add_campaign($campaign_type_id,$campaign_name,$campaign_start_date,$campaign_end_date,$campaign_cost,$campaign_description,$campaign_active);

			$core->force_page("index.php?page=campaign:view_campaign&campaign_id=".$campaign_id);

		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('campaign/add_campaign_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_campaign_frm');
	$smarty->display('campaign/add_campaign_frm.tpl');
}
?>