<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     add_product_status.php<br>
* Purpose:  Add New Product Status<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/product_status.class.php');

$product_status = new product_status();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new product_status
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$product_status_id = $product_status->add_product_status($_REQUEST);
			$core->force_page("index.php?page=product_status:view_product_status&product_status_id=".$product_status_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('product_status/add_product_status_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_product_status_frm');
	$smarty->display('product_status/add_product_status_frm.tpl');
}
?>