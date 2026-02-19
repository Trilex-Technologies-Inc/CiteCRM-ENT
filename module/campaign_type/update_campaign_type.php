<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_campaign_type.php<br>
	* Purpose:  Update a Single Campaign Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(CAN_EDIT);

require(CLASS_PATH.'/core/campaign_type.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	
	$campaign_type = new campaign_type();
	$campaign_type_text		= $core->prepare_post($_POST['campaign_type_text']);
	$campaign_type_active	= $_POST['campaign_type_active'];
	$campaign_type_id		= $_POST['campaign_type_id'];
	
	$campaign_type->update_campaign_type($campaign_type_text,$campaign_type_active,$campaign_type_id);
			

} else {
	// Display the Form
	$campaign_type = new campaign_type();
	$campaign_type->view_campaign_type($_POST['campaign_type_id']);

	
	
	$smarty->assign('campaign_type',$campaign_type);
	$smarty->display('campaign_type/update_campaign_type_frm.tpl');
}
?>