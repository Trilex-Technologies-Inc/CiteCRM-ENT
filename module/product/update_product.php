<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_product.php<br>
	* Purpose:  Update a Single Products row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/product.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new product
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$product = new product();
			$product->update_product($_REQUEST);
			$core->force_page("index.php?page=product:view_product&product_id=".$_REQUEST['product_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('product/update_product_frm.tpl');
		}
} else {
	// Display the Form

$product = new product();
$product->view_product($_REQUEST['product_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_product_frm');

$smarty->assign('product',$product);
$smarty->display('product/update_product_frm.tpl');
}
?>