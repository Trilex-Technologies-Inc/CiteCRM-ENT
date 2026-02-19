<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_tax_class.php<br>
	* Purpose:  Add New Tax Class<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/tax_class.class.php');
$tax_class = new tax_class();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new tax_class
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$tax_class_id = $tax_class->add_tax_class($_REQUEST);
			$core->force_page("index.php?page=tax_class:view_tax_class&tax_class_id=".$tax_class_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('tax_class/add_tax_class_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_tax_class_frm');
	$smarty->display('tax_class/add_tax_class_frm.tpl');
}
?>