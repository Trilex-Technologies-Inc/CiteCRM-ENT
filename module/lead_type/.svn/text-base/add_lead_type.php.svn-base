<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_lead_type.php<br>
	* Purpose:  Add New Lead Types<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(SUPER_USER);
require(CLASS_PATH.'/core/lead_type.class.php');
$lead_type = new lead_type();


// If form Submission
if(isset($_POST['submit']) ) {
	$lead_type_text		= $_POST['lead_type_text'];
	$lead_type_active	= $_POST['lead_type_active'];
	$lead_type_id = $lead_type->add_lead_type($lead_type_text,$lead_type_active);
			
	
} else {
	$smarty->display('lead_type/add_lead_type_frm.tpl');
}
?>