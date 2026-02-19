<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_crm_group.php<br>
	* Purpose:  Add New Group<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/crm_group.class.php');
$crm_group = new crm_group();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	
			$crm_group_id = $crm_group->add_crm_group($_REQUEST);
			$core->force_page("index.php?page=crm_group:view_crm_group&crm_group_id=".$crm_group_id);
		
} else {
	// Display the Form
	$smarty->display('crm_group/add_crm_group_frm.tpl');
}
?>