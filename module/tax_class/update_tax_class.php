<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_tax_class.php<br>
	* Purpose:  Update a Single Tax Class row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/tax_class.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new tax_class
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$tax_class = new tax_class();
			$tax_class->update_tax_class($_REQUEST);
			$core->force_page("index.php?page=tax_class:view_tax_class&tax_class_id=".$_REQUEST['tax_class_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('tax_class/update_tax_class_frm.tpl');
		}
} else {
	// Display the Form

$tax_class = new tax_class();
$tax_class->view_tax_class($_REQUEST['tax_class_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_tax_class_frm');

$smarty->assign('tax_class',$tax_class);
$smarty->display('tax_class/update_tax_class_frm.tpl');
}
?>