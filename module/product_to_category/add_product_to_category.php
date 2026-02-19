<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_product_to_category.php<br>
	* Purpose:  Add New Product To Category<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/product_to_category.class.php');
$product_to_category = new product_to_category();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new product_to_category
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$product_to_category_id = $product_to_category->add_product_to_category($_REQUEST);
			$core->force_page("index.php?page=product_to_category:view_product_to_category&product_to_category_id=".$product_to_category_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('product_to_category/add_product_to_category_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_product_to_category_frm');
	$smarty->display('product_to_category/add_product_to_category_frm.tpl');
}
?>