<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_crm_group.php<br>
	* Purpose:  Update a Single Group row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/crm_group.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new crm_group
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$crm_group = new crm_group();
			$crm_group->update_crm_group($_REQUEST);
			$core->force_page("index.php?page=crm_group:view_crm_group&crm_group_id=".$_REQUEST['crm_group_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('crm_group/update_crm_group_frm.tpl');
		}
} else {
	// Display the Form

$crm_group = new crm_group();
$crm_group->view_crm_group($_REQUEST['crm_group_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_crm_group_frm');

$smarty->assign('crm_group',$crm_group);
$smarty->display('crm_group/update_crm_group_frm.tpl');
}
?>