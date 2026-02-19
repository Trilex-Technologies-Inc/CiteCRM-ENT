<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_operating_system_manufacture.php<br>
* Purpose:  Update a Single Operating System Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/operating_system_manufacture.class.php');

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new operating_system_manufacture
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$operating_system_manufacture = new operating_system_manufacture();
			$operating_system_manufacture->update_operating_system_manufacture($_REQUEST);
			$core->force_page("index.php?page=operating_system_manufacture:view_operating_system_manufacture&operating_system_manufacture_id=".$_REQUEST['operating_system_manufacture_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('operating_system_manufacture/update_operating_system_manufacture_frm.tpl');
		}
} else {
	// Display the Form

$operating_system_manufacture = new operating_system_manufacture();
$operating_system_manufacture->view_operating_system_manufacture($_REQUEST['operating_system_manufacture_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_operating_system_manufacture_frm');
	SmartyValidate::register_validator('operating_system_manufacture_name',	'operating_system_manufacture_name', 'notEmpty');
	SmartyValidate::register_validator('operating_system_manufacture_active',	'operating_system_manufacture_active', 'notEmpty');

$smarty->assign('operating_system_manufacture',$operating_system_manufacture);
$smarty->display('operating_system_manufacture/update_operating_system_manufacture_frm.tpl');
}
?>