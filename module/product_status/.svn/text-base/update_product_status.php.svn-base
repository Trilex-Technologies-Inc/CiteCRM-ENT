<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     update_product_status.php<br>
* Purpose:  Update a Single Product Status row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/product_status.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new product_status
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$product_status = new product_status();
			$product_status->update_product_status($_REQUEST);
			$core->force_page("index.php?page=product_status:view_product_status&product_status_id=".$_REQUEST['product_status_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('product_status/update_product_status_frm.tpl');
		}
} else {
	// Display the Form

$product_status = new product_status();
$product_status->view_product_status($_REQUEST['product_status_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_product_status_frm');

$smarty->assign('product_status',$product_status);
$smarty->display('product_status/update_product_status_frm.tpl');
}
?>