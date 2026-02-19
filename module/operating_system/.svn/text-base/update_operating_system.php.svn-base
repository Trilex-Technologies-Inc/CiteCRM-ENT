<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_operating_system.php<br>
* Purpose:  Update a Single Operating System row<br>
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
			$operating_system->update_operating_system($_REQUEST);
			$core->force_page("index.php?page=operating_system:view_operating_system&operating_system_id=".$_REQUEST['operating_system_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('operating_system/update_operating_system_frm.tpl');
		}
} else {
	// Display the Form

$operating_system = new operating_system();
$operating_system->view_operating_system($_REQUEST['operating_system_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_operating_system_frm');
	SmartyValidate::register_validator('operating_system_manufacture_id',	'operating_system_manufacture_id', 'notEmpty');
	SmartyValidate::register_validator('operating_system_active',	'operating_system_active', 'notEmpty');

$smarty->assign('operating_system',$operating_system);
$smarty->display('operating_system/update_operating_system_frm.tpl');
}
?>