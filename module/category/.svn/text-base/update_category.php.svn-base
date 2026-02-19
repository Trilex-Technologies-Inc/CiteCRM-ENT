<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_category.php<br>
	* Purpose:  Update a Single Category row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/category.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new category
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$category = new category();
			$category->update_category($_REQUEST);
			$core->force_page("index.php?page=category:view_category&category_id=".$_REQUEST['category_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('category/update_category_frm.tpl');
		}
} else {
	// Display the Form

$category = new category();
$category->view_category($_REQUEST['category_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_category_frm');

$smarty->assign('category',$category);
$smarty->display('category/update_category_frm.tpl');
}
?>