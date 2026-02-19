<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_vendor.php<br>
	* Purpose:  Update a Single Vendor row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/vendor.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new vendor
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$vendor = new vendor();
			$vendor->update_vendor($_REQUEST);
			$core->force_page("index.php?page=vendor:view_vendor&vendor_id=".$_REQUEST['vendor_id']);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->display('vendor/update_vendor_frm.tpl');
		}
} else {
	// Display the Form

$vendor = new vendor();
$vendor->view_vendor($_REQUEST['vendor_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_vendor_frm');

$smarty->assign('vendor',$vendor);
$smarty->display('vendor/update_vendor_frm.tpl');
}
?>