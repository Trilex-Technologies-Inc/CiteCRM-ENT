<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_tax_type.php<br>
	* Purpose:  Update a Single Tax Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/tax_type.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new tax_type
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$tax_type = new tax_type();
			$tax_type->update_tax_type($_REQUEST);
			$core->force_page("index.php?page=tax_type:view_tax_type&tax_type_id=".$_REQUEST['tax_type_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('tax_type/update_tax_type_frm.tpl');
		}
} else {
	// Display the Form

$tax_type = new tax_type();
$tax_type->view_tax_type($_REQUEST['tax_type_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_tax_type_frm');

$smarty->assign('tax_type',$tax_type);
$smarty->display('tax_type/update_tax_type_frm.tpl');
}
?>