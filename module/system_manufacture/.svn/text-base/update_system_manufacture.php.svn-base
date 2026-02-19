<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_system_manufacture.php<br>
* Purpose:  Update a Single System Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/system_manufacture.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new system_manufacture
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$system_manufacture = new system_manufacture();
			$system_manufacture->update_system_manufacture($_REQUEST);
			$core->force_page("index.php?page=system_manufacture:view_system_manufacture&system_manufacture_id=".$_REQUEST['system_manufacture_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('system_manufacture/update_system_manufacture_frm.tpl');
		}
} else {
	// Display the Form

$system_manufacture = new system_manufacture();
$system_manufacture->view_system_manufacture($_REQUEST['system_manufacture_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_system_manufacture_frm');
	SmartyValidate::register_validator('manufacture_abrv',	'manufacture_abrv', 'notEmpty');
	SmartyValidate::register_validator('manufacture_name',	'manufacture_name', 'notEmpty');

$smarty->assign('system_manufacture',$system_manufacture);
$smarty->display('system_manufacture/update_system_manufacture_frm.tpl');
}
?>