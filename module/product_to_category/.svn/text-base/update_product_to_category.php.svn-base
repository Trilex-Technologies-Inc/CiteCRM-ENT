<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_product_to_category.php<br>
	* Purpose:  Update a Single Product To Category row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/product_to_category.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new product_to_category
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$product_to_category = new product_to_category();
			$product_to_category->update_product_to_category($_REQUEST);
			$core->force_page("index.php?page=product_to_category:view_product_to_category&product_to_category_id=".$_REQUEST['product_to_category_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('product_to_category/update_product_to_category_frm.tpl');
		}
} else {
	// Display the Form

$product_to_category = new product_to_category();
$product_to_category->view_product_to_category($_REQUEST['product_to_category_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_product_to_category_frm');

$smarty->assign('product_to_category',$product_to_category);
$smarty->display('product_to_category/update_product_to_category_frm.tpl');
}
?>