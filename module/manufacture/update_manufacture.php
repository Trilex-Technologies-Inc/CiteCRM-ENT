<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_manufacture.php<br>
* Purpose:  Update a Single Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/manufacture.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new manufacture
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$manufacture = new manufacture();
			$manufacture->update_manufacture($_REQUEST);
			$core->force_page("index.php?page=manufacture:view_manufacture&manufacture_id=".$_REQUEST['manufacture_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('manufacture/update_manufacture_frm.tpl');
		}
} else {
	// Display the Form

$manufacture = new manufacture();
$manufacture->view_manufacture($_REQUEST['manufacture_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_manufacture_frm');

$smarty->assign('manufacture',$manufacture);
$smarty->display('manufacture/update_manufacture_frm.tpl');
}
?>