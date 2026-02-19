<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_test_six.php<br>
	* Purpose:  Update a Single Test Six row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/test_six.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new test_six
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$test_six = new test_six();
			$test_six->update_test_six($_REQUEST);
			$core->force_page("index.php?page=test_six:view_test_six&test_six_id=".$_REQUEST['test_six_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('test_six/update_test_six_frm.tpl');
		}
} else {
	// Display the Form

$test_six = new test_six();
$test_six->view_test_six($_REQUEST['test_six_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_test_six_frm');

$smarty->assign('test_six',$test_six);
$smarty->display('test_six/update_test_six_frm.tpl');
}
?>