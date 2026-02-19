<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_lead_type.php<br>
* Purpose:  Update a Single Lead Types row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);
require(CLASS_PATH.'/core/lead_type.class.php');


// If form Submission
if(isset($_POST['submit']) ) {
    $lead_type_text     = $_POST['lead_type_text'];
    $lead_type_active   = $_POST['lead_type_active'];
    $lead_type_id       = $_POST['lead_type_id'];

	$lead_type = new lead_type();
	$lead_type->update_lead_type($lead_type_id,$lead_type_active,$lead_type_text);
} else {
	// Display the Form
	$lead_type = new lead_type();
	$lead_type->view_lead_type($_POST['lead_type_id']);
	$smarty->assign('lead_type',$lead_type);
	$smarty->display('lead_type/update_lead_type_frm.tpl');
}
?>