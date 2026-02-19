<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_campaign_type.php<br>
	* Purpose:  delete a Single Campaign Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(CAN_DELETE);

require(CLASS_PATH.'/core/campaign_type.class.php');


$campaign_type = new campaign_type();

$campaign_type->delete_campaign_type($_POST['campaign_type_id']);



?>