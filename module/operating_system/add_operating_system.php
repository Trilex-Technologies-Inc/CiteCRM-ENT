<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     add_operating_system.php<br>
* Purpose:  Add New Operating System<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/operating_system.class.php');

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new operating_system
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$operating_system = new operating_system();
			$operating_system_id = $operating_system->add_operating_system($_REQUEST);
			$core->force_page("index.php?page=operating_system:view_operating_system&operating_system_id=".$operating_system_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('operating_system/add_operating_system_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_operating_system_frm');
	
	$smarty->display('operating_system/add_operating_system_frm.tpl');
}
?>