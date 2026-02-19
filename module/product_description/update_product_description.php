<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_product_description.php<br>
	* Purpose:  Update a Single Product Description row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/product_description.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new product_description
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$product_description = new product_description();
			$product_description->update_product_description($_REQUEST);
			$core->force_page("index.php?page=product_description:view_product_description&product_description_id=".$_REQUEST['product_description_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('product_description/update_product_description_frm.tpl');
		}
} else {
	// Display the Form

$product_description = new product_description();
$product_description->view_product_description($_REQUEST['product_description_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_product_description_frm');

$smarty->assign('product_description',$product_description);
$smarty->display('product_description/update_product_description_frm.tpl');
}
?>