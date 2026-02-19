<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_campaign_type.php<br>
	* Purpose:  Add New Campaign Type<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/campaign_type.class.php');
$campaign_type = new campaign_type();

// If form Submission
if(isset($_POST['submit']) ) {
	
	$campaign_type_text 	= $core->prepare_post($_POST['campaign_type_text']);
	$campaign_type_active 	= $_POST['campaign_type_active'];
	
	$campaign_type_id 		= $campaign_type->add_campaign_type($campaign_type_text,$campaign_type_active);
	
		
} else {
	$smarty->display('campaign_type/add_campaign_type_frm.tpl');
}
?>