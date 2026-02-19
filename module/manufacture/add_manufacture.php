<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     add_manufacture.php<br>
* Purpose:  Add New Manufacture<br>
*
* @author Cite CMS Module Developer
* @access Public
* @ersion 1.0
	*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/manufacture.class.php');
$manufacture = new manufacture();


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new manufacture
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$manufacture_id = $manufacture->add_manufacture($_REQUEST);
			$core->force_page("index.php?page=manufacture:view_manufacture&manufacture_id=".$manufacture_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('manufacture/add_manufacture_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_manufacture_frm');
	$smarty->display('manufacture/add_manufacture_frm.tpl');
}
?>