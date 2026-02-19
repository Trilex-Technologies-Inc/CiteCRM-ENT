<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_tax_type.php<br>
	* Purpose:  Add New Tax Type<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/tax_type.class.php');
$tax_type = new tax_type();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new tax_type
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$tax_type_id = $tax_type->add_tax_type($_REQUEST);
			$core->force_page("index.php?page=tax_type:view_tax_type&tax_type_id=".$tax_type_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('tax_type/add_tax_type_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_tax_type_frm');
	$smarty->display('tax_type/add_tax_type_frm.tpl');
}
?>