<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_file.php<br>
	* Purpose:  Update a Single Files row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/file.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new file
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$file = new file();
			$file->update_file($_REQUEST);
			$core->force_page(ROOT_URL."/index.php?page=file:view_file&file_id=".$_REQUEST['file_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('file/update_file_frm.tpl');
		}
} else {
	// Display the Form

$file = new file();
$file->view_file($_REQUEST['file_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_file_frm');

$smarty->assign('file',$file);
$smarty->display('file/update_file_frm.tpl');
}
?>