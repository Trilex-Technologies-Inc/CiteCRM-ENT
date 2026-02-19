<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_category.php<br>
	* Purpose:  Add New Category<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/category.class.php');
$category = new category();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new category
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$category_id = $category->add_category($_REQUEST);
			$core->force_page("index.php?page=category:view_category&category_id=".$category_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('category/add_category_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_category_frm');
	$smarty->display('category/add_category_frm.tpl');
}
?>