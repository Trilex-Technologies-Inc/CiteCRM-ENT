<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_file.php<br>
	* Purpose:  Add New Files<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/file.class.php');
$file = new file();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new file
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$file_id = $file->add_file($_REQUEST);
			$core->force_page(ROOT_URL."/index.php?page=file:view_file&file_id=".$file_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('file/add_file_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_file_frm');
	$smarty->display('file/add_file_frm.tpl');
}
?>