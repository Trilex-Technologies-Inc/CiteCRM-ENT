<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_product_description.php<br>
	* Purpose:  Add New Product Description<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/product_description.class.php');
$product_description = new product_description();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new product_description
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$product_description_id = $product_description->add_product_description($_REQUEST);
			$core->force_page("index.php?page=product_description:view_product_description&product_description_id=".$product_description_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('product_description/add_product_description_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_product_description_frm');
	$smarty->display('product_description/add_product_description_frm.tpl');
}
?>