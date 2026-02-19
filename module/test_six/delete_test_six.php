<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_test_six.php<br>
	* Purpose:  delete a Single Test Six row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/test_six.class.php');

	$core->verifyAdmin();

$test_six = new test_six();

$test_six->delete_test_six($_REQUEST['test_six_id']);

$smarty->display('test_six/delete_test_six.tpl')

?>