<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_test_six.php<br>
	* Purpose:  Add New Test Six<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/test_six.class.php');
$test_six = new test_six();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new test_six
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$test_six_id = $test_six->add_test_six($_REQUEST);
			$core->force_page("index.php?page=test_six:view_test_six&test_six_id=".$test_six_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('test_six/add_test_six_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_test_six_frm');
	$smarty->display('test_six/add_test_six_frm.tpl');
}
?>